(function($) {
    // Initialize Intersection Observer for scroll animation
    function initScrollAnimation() {
        const animatedHeadings = document.querySelectorAll('.tp-heading-scroll-animation .heading-text-wrapper');
        
        if (!animatedHeadings.length || !('IntersectionObserver' in window)) return;
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateHeading($(entry.target));
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5 // Trigger when 50% of element is visible
        });
        
        animatedHeadings.forEach(heading => {
            observer.observe(heading);
        });
    }
    
    // Animate heading letters
    function animateHeading($headingWrapper) {
        const text = $headingWrapper.text();
        const letters = text.split('');
        
        // Clear the wrapper
        $headingWrapper.empty();
        
        // Create spans for each letter
        letters.forEach((letter, index) => {
            const $letterSpan = $('<span>')
                .addClass('letter')
                .text(letter === ' ' ? ' ' : letter)
                .css({
                    'display': 'inline-block',
                    'opacity': 0,
                    'transform': 'translateY(20px)',
                    'transition': `all 0.5s ease ${index * 0.05}s`
                });
            
            $headingWrapper.append($letterSpan);
        });
        
        // Trigger animation
        setTimeout(() => {
            $headingWrapper.find('.letter').each(function() {
                $(this).css({
                    'opacity': 1,
                    'transform': 'translateY(0)'
                });
            });
        }, 100);
    }
    
    // Initialize on document ready
    $(document).ready(function() {
        initScrollAnimation();
    });
    
    // Reinitialize when Elementor reloads content
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/tp_heading.default', function($scope) {
            if ($scope.find('.tp-heading-scroll-animation').length) {
                initScrollAnimation();
            }
        });
    });
})(jQuery);