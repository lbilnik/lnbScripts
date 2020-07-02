/* Grafika slideshow */
$(function () {
    
    var change_img_time     = 4000; 
    var transition_speed    = 200;
    var transition_speed_in = 400;
    var simple_slideshow    = $("#Slider"), 
        listItems           = simple_slideshow.children('li'),
        listLen             = listItems.length,
        i                   = 0,
        changeList = function () {
            listItems.eq(i).fadeOut(transition_speed, function () {
                $("#img1").animate({width: "toggle", opacity: 0.05}, "slow");
                $("#img2").animate({width: "toggle",  opacity: 0.05}, "slow");
                $("#img3").animate({width: "toggle",  opacity: 0.05}, "slow");
                 $('#progres').animate({
                         width:400,
                                 }, 4000);
                
                $('#log').empty(i);
                i += 1;
                if (i === listLen) {
                    i = 0;

                }
                listItems.eq(i).fadeIn(transition_speed_in);
                $("#img1").animate({width: "toggle", opacity: 1.00}, "slow");
                $("#img2").animate({width: "toggle", opacity: 1.00}, "slow");
                $("#img3").animate({width: "toggle", opacity: 1.00}, "slow");
                $('#progres').animate({
                         width:0,
                                 }, 0);

                $('#log').append(i);
            });

        };

    listItems.not(':first').hide();
    setInterval(changeList, change_img_time);

});
/* Animacja Tekstu Slaid, write, focus */
$(document).ready(function(){
$(function () {
    
    function windowActive() { focus = true; }
    function windowInactive() { focus = false; }
    window.onfocus = windowActive;
    window.onblur = windowInactive;

    var tekst1 = "Wszystkie elementy tej strony są napisane przeze mnie, nie wykorzystałem żadnych zewnętrznych pluginów";
    var tekst2 =  "jQuery pozwala w prosty sposób dodawać efekty do stron www.";
    var tekst3 = "Pluginy w jQuery to nowa metoda przedłużania(extend) obiektu prototype.";
    var tekst4 = "Ten skrypt sprawdza czy użytkownik jest obecnie na tym oknie i przedziwdziała niepożądanym efektom";
    var interval = (1000/30); //30fps
    var change_tekst_time   = 5000; 
    var transition_speed    = 200;
    var transition_speed_in = 300;
    var simple_slideshow    = $("#Slider2"), 
        listItems           = simple_slideshow.children('li'),
        listdlug            = listItems.length,
        j                   = 0,
        changeList = function () {
              if(focus){
            listItems.eq(j).fadeOut(transition_speed, function () {
               
               var showText = function (targets, message, index, interval) {   
                if (index < message.length) {
                $(targets).append(message[index++]);
                setTimeout(function () { showText(targets, message, index, interval); }, interval);
                     }
                }
                $('#Slider2').empty();  

                j += 1;
                if (j === listdlug ) {
                    j = 0;

                }

                listItems.eq(j).fadeIn(transition_speed_in); 
                
                $(function () {
                if(j == 0) {
                showText("#Slider2",tekst1, -1, 30);
                $("#Slider2").css("color", "white");
                }
                if(j == 1 ) {
                showText("#Slider2",tekst2, -1, 30);
                $("#Slider2").css("color", "white");
                }
                if(j == 2 ) {
                showText("#Slider2",tekst3, -1, 30);
                $("#Slider2").css("color", "white");
                }
                if(j == 3 ) {
                showText("#Slider2",tekst4, -1, 30);
                $("#Slider2").css("color", "white");
                }
                });
            });
            }
        };

    listItems.not(':first').hide();
    setInterval(changeList, change_tekst_time);

    });
});

/* menu rozwiane + animacja */
$(document).ready(function(){
    $("#slide").click(function(){
		$("#anim").animate({width: '55px', opacity: 0.00}, "slow");
        $("#panel").slideDown("slow");
    });
    $("#panel").click(function(){
		$("#panel2").slideDown("slow");
		$("#anim2").animate({width: '55px', opacity: 0.00}, "slow");
		$("#panel").off("click");
    });
     $("#zwin").click(function(){
        $("#panel2").slideUp();
        $("#anim2").animate({width: '0px', opacity: 1.00}, "slow");

    });
    $("#wiecej").click(function(){
        $("#panel2").slideDown();
        $("#anim2").animate({width: '55px', opacity: 0.00}, "slow");

    });
    /* kropka menu rozwiane */
    $("#footerimg").click(function(){
        $("#footerpanel").toggle("slow");
        $("#footerpaneltext").toggle("slow");

    });
              
});

/* przyciski slide - ciężkie przerobić  */
$(document).ready(function(){
    $("#uploader").hide();
    $("#geter").click(function(){
		$("#ajaxtekst").load("materials/tekst_text.txt");
            $("#coloring").slideDown();

    });
	    $("#uploader").click(function(){
		$("#ajaxtekst").load("materials/tekst_text.txt");
		  $("#unloader").slideDown();
            $("#uploader").slideUp();
		      $("#ajaxtekst").slideDown();
				$("#czytaj").slideDown();
                    $("#coloring").slideDown();
    });
	$("#czytaj").click(function(){
		$("#ajaxtekst2").load("materials/tekst_text2.txt");
			$("#unloader2").slideDown();
				$("#czytaj").slideUp();
					$("#ajaxtekst2").slideDown();
                        $("#coloring2").slideDown();
	});
	$( "#geter").click(function() {
		$( this ).slideUp();
			$("#czytaj").slideDown();
				$("#unloader").slideDown();
	});
	$("#unloader").click(function() {
		$("#ajaxtekst").load("materials/blankpage.html");
		    $("#uploader").show();
	});
	$( "#unloader").click(function() {
		$( this ).slideUp();
			$("#ajaxtekst").slideUp();
				$("#czytaj").slideUp();
                    $("#coloring").slideUp();
                        $("#coloring-white").slideUp();
	});
	$("#unloader2").click(function(){
		$("#ajaxtekst2").load("materials/blankpage.html");
			$("#unloader2").slideUp();
                $("#czytaj").slideDown();
                    $("#coloring2").slideUp();
                        $("#coloring-white2").slideUp();
});
    $("#coloring").click(function(){
            $("#coloring").slideUp();
                $("#coloring-white").slideDown();
});
        $("#coloring2").click(function(){
            $("#coloring2").slideUp();
                $("#coloring-white2").slideDown();
});
        $("#coloring-white").click(function(){
            $("#coloring-white").slideUp();
                $("#coloring").slideDown();
});
        $("#coloring-white2").click(function(){
            $("#coloring-white2").slideUp();
                $("#coloring2").slideDown();
});
        $("#footerimganim").click(function(){
                $("#animtekst").toggle("clip");
});
});

//Kolory plugin color-pugin.js nadpisywanie ustawień default
    $("#coloring").click(function(){
        $( "#ajaxtekst" ).coloring({
            color: "#9baf00",
            border: "none"
    });
});
    $("#coloring2").click(function(){
        $( "#ajaxtekst2" ).coloring({
            color: "#9baf00",
            border: "none"
    });
});
     $("#coloring-white").click(function(){
        $( "#ajaxtekst" ).coloring({
            color: "white",
            border: "none"
    });
});
    $("#coloring-white2").click(function(){
        $( "#ajaxtekst2" ).coloring({
            color: "white",
            border: "none"
    });
});
    $("#footerimg2").click(function(){
            $( "#footerpanel" ).coloring({
            border: "2px solid green"
        });
    }); 
    $("#footerimg3").click(function(){
            $( "#footerpanel" ).coloring({
            border: "2px solid #ff9f95"
        });
    });
     $("#footerimg4").click(function(){
            $( "#footerpanel" ).coloring({
            border: "none"
        });
    });    
/* footer prosta animacja z przyciskamij */
$(document).ready(function(){
    $("#footerstart").click(function(){
        $("#movetekst").animate({ 
            'padding-left' : 120,
            'padding-right' : 0,
            'padding-bottom' : 0,
            'padding-top' : 0,
            },"slow");
      });
      $("#footerstop").click(function(){
        $("#movetekst").animate({ 
            'padding-left' : 0,
            'padding-right' : 120,
            'padding-bottom' : 0,
            'padding-top' : 0,
            },"slow");

      }); 
      /* Panel CSS */
    var $target = $('.kolorowanytekst'),
    $inputs = $('.panelval > .row > #kolorForm > input'),
    applyStyles = function(){
        $target.css(this.name, this.value);
    };
    $('#PrzyciskSave').click(function(){
    $inputs.each(applyStyles);
}); 
    }); 
