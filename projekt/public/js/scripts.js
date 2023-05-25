/*!
* Start Bootstrap - Clean Blog v6.0.9 (https://startbootstrap.com/theme/clean-blog)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-clean-blog/blob/master/LICENSE)
*/
window.addEventListener('DOMContentLoaded', () => {
    let scrollPos = 0;
    const mainNav = document.getElementById('mainNav');
    const headerHeight = mainNav.clientHeight;
    window.addEventListener('scroll', function() {
        const currentTop = document.body.getBoundingClientRect().top * -1;
        if ( currentTop < scrollPos) {
            // Scrolling Up
            if (currentTop > 0 && mainNav.classList.contains('is-fixed')) {
                mainNav.classList.add('is-visible');
            } else {
                console.log(123);
                mainNav.classList.remove('is-visible', 'is-fixed');
            }
        } else {
            // Scrolling Down
            mainNav.classList.remove(['is-visible']);
            if (currentTop > headerHeight && !mainNav.classList.contains('is-fixed')) {
                mainNav.classList.add('is-fixed');
            }
        }
        scrollPos = currentTop;
    });
})


function AddReadMore() {
    //This limit you can set after how much characters you want to show Read More.
    var carLmt = 300;
    // Text to show when text is collapsed
    var readMoreTxt = " ... több";
    // Text to show when text is expanded
    var readLessTxt = " kevesebb";


    //Traverse all selectors with this class and manipulate HTML part to show Read More
    $(".add-read-more").each(function () {
        if ($(this).find(".first-section").length)
            return;

        var allstr = $(this).text();
        if (allstr.length > carLmt) {
            var firstSet = allstr.substring(0, carLmt);
            var secdHalf = allstr.substring(carLmt, allstr.length);
            var strtoadd = firstSet + "<span class='second-section'>" + secdHalf + "</span><span class='read-more'  title='Több'>" + readMoreTxt + "</span><span class='read-less' title='Kevesebb'>" + readLessTxt + "</span>";
            $(this).html(strtoadd);
        }
    });

    //Read More and Read Less Click Event binding
    $(document).on("click", ".read-more,.read-less", function () {
        $(this).closest(".add-read-more").toggleClass("show-less-content show-more-content");
    });
}

jQuery(function ($) {
    AddReadMore();
});
