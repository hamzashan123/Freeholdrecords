jQuery(document).ready(function () {
    //scrollToTop()
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = jQuery("fieldset").length;

    if (
        localStorage.getItem("fieldset") !== "" ||
        localStorage.getItem("fieldset") !== null ||
        localStorage.getItem("fieldset") !== undefined
    ) {
        //alert(localStorage.getItem('currentstep'));
        const fieldsetid = localStorage.getItem("fieldset");
        if (fieldsetid == "fieldsetone") {
            jQuery("#fieldsetone").show();
            jQuery("#fieldsettwo").hide();
            jQuery("#fieldsetthree").hide();
            jQuery("#fieldsetfour").hide();

            current = 1;
        } else if (fieldsetid == "fieldsettwo") {
            //jQuery('#fieldsetone').hide();
            jQuery("#fieldsetone").hide();
            jQuery("#fieldsettwo").show();
            jQuery("#fieldsetthree").hide();
            jQuery("#fieldsetfour").hide();

            current = 2;
        } else if (fieldsetid == "fieldsetthree") {
            //jQuery('#fieldsetone').hide();
            jQuery("#fieldsetone").hide();
            jQuery("#fieldsettwo").hide();
            jQuery("#fieldsetthree").show();
            jQuery("#fieldsetfour").hide();

            current = 3;
        } else if (fieldsetid == "fieldsetfour") {
            //localStorage.removeItem('fieldset')
            //window.location.href = '/admin';
            jQuery("#fieldsetone").hide();
            jQuery("#fieldsettwo").hide();
            jQuery("#fieldsetthree").hide();
            jQuery("#fieldsetfour").show();

            current = 4;

            //window.location.reload();
        }
    }

    setProgressBar(current);

    jQuery(".next").click(function (e) {
        current_fs = jQuery(this).parent();
        console.log("current", current);

        next_fs = jQuery(this).parent().next();
        console.log("next_fs", next_fs);
        setTimeout(function () {
            $(".next").val("Next");
            // $('body.client #fieldsetfour .next').val('Submit');
            next_fs.show();
            current_fs.animate(
                { opacity: 0 },
                {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            display: "none",
                            position: "relative",
                        });
                        next_fs.css({ opacity: opacity });
                    },
                    duration: 500,
                }
            );

            jQuery("#progressbar li")
                .eq(jQuery("fieldset").index(next_fs))
                .addClass("active");

            setProgressBar(++current);
            //  scrollToTop()
            //window.scrollTo({ top: 0, behavior: "smooth" });
            jQuery('html, body').animate({scrollTop:0}, 'slow');

            if (next_fs.attr("id") == "fieldsetfive") {
                $("#form360").submit();
            }
        }, 500);
    });

    jQuery(".previous").click(function () {
        current_fs = jQuery(this).parent();
        previous_fs = jQuery(this).parent().prev();

        //Remove class active
        jQuery("#progressbar li")
            .eq(jQuery("fieldset").index(current_fs))
            .removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate(
            { opacity: 0 },
            {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        display: "none",
                        position: "relative",
                    });
                    previous_fs.css({ opacity: opacity });
                },
                duration: 500,
            }
        );
        setProgressBar(--current);
        //  scrollToTop()
        //window.scrollTo({ top: 0, behavior: "smooth" });
        jQuery('html, body').animate({scrollTop:0}, 'slow');
    });

    function setProgressBar(curStep) {
        console.log("currnt step ", curStep);
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        jQuery(".progress-bar").css("width", percent + "%");
    }

    jQuery(window).keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    setProgressBar(current);

    $(".submitemployerform").on("click", function(){
         localStorage.removeItem("fieldset");
     });

    jQuery("#employersubmit").click(function () {
        localStorage.removeItem("fieldset");
        localStorage.setItem(
            "fieldset",
            jQuery(this).closest("fieldset").attr("id")
        );
        console.log(localStorage.getItem("fieldset"));
        $("#formsubmitemail").val("true");
    });

    jQuery(".save").click(function (e) {
        $(this).val("Saving");
        $(this).attr("disabled", "disabled");

        localStorage.removeItem("fieldset");
        localStorage.setItem(
            "fieldset",
            jQuery(this).closest("fieldset").attr("id")
        );
        console.log(localStorage.getItem("fieldset"));
        $("#form360").submit();
    });
});
