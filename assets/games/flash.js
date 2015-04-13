/**
 * Flash game jQuery, JavaScript Engine v 1.0
 * This file drive game [generator] & game [progress].
 */ 

/**
 * Global Variables
 * @type Array
 */
var asterisk       = '***';

//var text_sentences = [];
//var images_array   = [];
//var answer_array   = [];
//var images_values  = [];
//var timeout_val;
//var counter        = 0;
//var new_session;
//var finishGame     = false;
//var thisTheater;

var components = [];

function myClass() {
    this.text_sentences = [];
    this.images_array   = [];
    this.answer_array   = [];
    this.images_values  = [];
    this.timeout_val    = 0;
    this.counter        = 0;
    this.new_session    = "";
    this.finishGame     = false;
    this.thisTheater    = "";
}

/**
 * Dialog creator class.
 * @param {type} title
 * @param {type} message
 * @param {type} type
 * @returns {undefined}
 */
function dialogCreator(title, message, type) {
    var dialog = document.createElement('div');
    var icon;
    switch(type){
        case "alert":
            icon = '<i class="warning sign icon"></i>';
            break;
        case "success":
            icon = '<i class="check circle icon"></i>';
            break;
        default:
    }
    $(dialog).append(icon).append(message);
    $(dialog).attr('title', title);
    
    $(dialog).dialog({
        modal: true,
        width: 350,
        buttons: {
            OK: function(){
                $(this).dialog('close').remove();
            }
        }
    });
}
/**
 * 
 * @param {type} word
 * @returns {undefined}
 */
function player(word, theaterID) {
    components[theaterID].thisTheater.find('.words_container').html(asterisk);
    components[theaterID].thisTheater.find('.words_container').html(word);
    setTimeout(function(){
        components[theaterID].thisTheater.find('.words_container').html(asterisk);
    }, components[theaterID].timeout_val * 1000);
    components[theaterID].counter++;
    $("#answer_field", components[theaterID].thisTheater).val('');
    //$("#answer_field", components[theaterID].thisTheater).focus();
}

function imagePlayer(image, theaterID) {
    components[theaterID].thisTheater.find('.images_container').show();
    components[theaterID].thisTheater.find('.images_container').attr('src', image);
    setTimeout(function(){
        components[theaterID].thisTheater.find('.images_container').hide();
    }, components[theaterID].timeout_val * 1000);
    components[theaterID].counter++;
    $("#image_answer_field", components[theaterID].thisTheater).val('');
    //$("#image_answer_field", components[theaterID].thisTheater).focus();
}

/**
 * Return correct answers.
 * @param {type} element
 * @param {type} index
 * @param {type} array
 * @returns {Boolean}
 */
function getCorrect(element, index, array) {
    return (element === 100);
}

/**
 * initialize game for new session
 * @returns {undefined}
 */
function initGame(theaterID) {
    components[theaterID].thisTheater.find('.center').empty();
    components[theaterID].thisTheater.find('.center').html(components[theaterID].new_session);
    components[theaterID].answer_array = [];
    components[theaterID].counter = 0;
}

$(document).ready(function(){
    console.log('Flash engine is ready.');
    /**
     * Choosing flash game type
     */
    $("body").on("change", ".ui.dropdown", function(){
        var val = $(this).parent().parent().find('.item.active.selected').attr('data-value');
        
        switch(val) {
            case "1":
                $(this).parent().find(".text-flash").hide();
                $(this).parent().find(".image-flash").fadeIn();
                $(this).parent().find('.configuration').hide();
                $(this).parent().find('.configuration-image').fadeIn();
                filesLoader('assets\\games\\images\\flash-images',$(this).parent().find('#all_image_files'), '.game-images .content');
                break;
            case "2":
                $(this).parent().find(".image-flash").hide();
                $(this).parent().find(".text-flash").fadeIn();
                $(this).parent().find('.configuration').fadeIn();
                $(this).parent().find('.configuration-image').hide();
                break;
            default:
        }
    });
    
    /**
     * Add sentences in text flash game.
     */
    $("body").on("submit", "#flash-game-form", function(){
        var theaterID = $(this).parent().parent().parent().parent().parent().find('.theater').attr('id');
        
        if(!components[theaterID]) {
            components[theaterID] = new myClass();
            components[theaterID].thisTheater = $(this).parent().parent().parent().parent().parent().find('.theater');
          
            components[theaterID].thisTheater.dimmer({
                closable: false
            });
        }
        
        console.log(components[theaterID]);
        
        if($(this).find('#sentence-text').val() !== "") {
            var sentence = document.createElement('div');
            $(sentence).css({"float":"left","margin-top":"5px"});
            $(sentence).addClass("ui blue inverted button");
            $(sentence).html($(this).find('#sentence-text').val());
            $(this).parent().find('#sentences').append(sentence);
            components[theaterID].text_sentences.push($(this).find('#sentence-text').val());
            $(this).find('#sentence-text').val('');
        }
        return false;
    });
    
    /**
     * Remove sentence on click in text flash game.
     */
    $("body").on("click", ".layout #sentences div", function(){
        var theaterID = $(this).parent().parent().parent().parent().parent().parent().find('.theater').attr('id');
        
        components[theaterID].text_sentences.splice($(this).index(), 1);
        
        $(this).fadeOut(function(){
            $(this).remove();
        });
        
    });
    
    /**
     * Empty sentences area.
     */
    $("body").on("click", ".layout .empty-sentence-area", function(){
        var theaterID = $(this).parent().parent().parent().parent().parent().find('.theater').attr('id');
        
        $(this).parent().parent().parent().find('#sentences').empty();
        $(this).parent().parent().parent().find('#timeout').val('');
        components[theaterID].text_sentences = [];
        components[theaterID].timeout_val = 0;
        
        /* Use initialization class */
        initGame(theaterID);
    });
    
    /**
     * Empty images area.
     */
    $("body").on("click", ".layout .empty-image-area", function(){
        var theaterID = $(this).parent().parent().parent().parent().parent().find('.theater').attr('id');
        
        $(this).parent().parent().parent().find('#game-images .content').empty();
        $(this).parent().parent().parent().find('#timeout').val('');
        components[theaterID].images_array  = [];
        components[theaterID].images_values = [];
        components[theaterID].timeout_val   = 0;
        
        /* Use initialization class */
        initGame(theaterID);
    });
    
    /**
     * Play the text flash game
     */
    $("body").on("click", ".layout .play-sentence", function(){
        var theaterID = $(this).parent().parent().parent().parent().parent().find('.theater').attr('id');
        console.log(components[theaterID]);
        if(components[theaterID].new_session) {initGame(theaterID);}
         
        components[theaterID].timeout_val = $(this).parent().parent().parent().find('#timeout').val();
        // Check if timeout sat.
        if(!components[theaterID].timeout_val) {
            dialogCreator('Alert','Please define timeout value first!', 'alert');
            return;
        }
        
        // Check if there is sentences
        if(components[theaterID].text_sentences.length === 0) {
            dialogCreator('Alert', 'Please insert at least one sentence!', 'alert');
            return;
        }
        
        if(!components[theaterID].new_session) {
            components[theaterID].new_session = components[theaterID].thisTheater.find('.center').html();
        }
        
        components[theaterID].thisTheater.dimmer('show');
        var progress = setInterval(function(){
            components[theaterID].thisTheater.find('.center').find('#prepare-progress-bar').progress('increment');
            if(components[theaterID].thisTheater.find('.indicating .progress').html() === "100%") {
                clearInterval(progress);
                setTimeout(function(){
                    components[theaterID].thisTheater.find('.center').empty();
                    var gameContainer = document.createElement('div');
                    $(gameContainer).addClass('ui orange inverted segment');
                    $(gameContainer).css({"width":"400px", "margin":"auto","min-height":"120px","position":"relative"});
                    var nextBtn = document.createElement('button');
                    $(nextBtn).addClass('ui button');
                    $(nextBtn).attr('id', 'next_word');
                    $(nextBtn).html("Next");
                    $(nextBtn).css({"position":"absolute","bottom":"10px","right":"10px"});
                    var words_container = document.createElement('div');
                    $(words_container).addClass('ui segment words_container');
                    $(words_container).html('<i style="visibility: hidden;">info</i>');
                    
                    var answer_div = document.createElement('div');
                    var answer_input = document.createElement('input');
                    $(answer_div).addClass('ui input');
                    $(answer_input).attr({'id':'answer_field','placeholder':'Type answer here'});
                    $(answer_div).append(answer_input);
                    $(answer_div).css({'width':'250px','position':'absolute','left':'10px','bottom':'10px'});
                    
                    $(gameContainer).append(words_container).append(answer_div);
                    $(gameContainer).append(nextBtn);
                    
                    var alertArea = document.createElement('div');
                    $(alertArea).addClass('ui message');
                    $(alertArea).attr("id","alert_area");
                    $(alertArea).html('<i style="visibility: hidden;">info</i>');
                    $(alertArea).css({"width":"400px", "margin":"auto","position":"relative","margin-top":"10px","display":"block"});
                    
                    components[theaterID].thisTheater.find('.center').append(gameContainer).append(alertArea);
                    
                    /* Initialize player */
                    setTimeout(function(){
                        player(components[theaterID].text_sentences[0], theaterID);
                    }, 1000);
                }, 1000);
            }
        }, 50);
    });
    
    /**
     * play image flash game
     */
    $("body").on("click", ".layout .play-image", function(){
        
        var theaterID = $(this).parent().parent().parent().parent().parent().find('.theater').attr('id');
        
        if(!components[theaterID]) {
            components[theaterID] = new myClass();
            components[theaterID].thisTheater = $(this).parent().parent().parent().parent().parent().find('.theater');
            components[theaterID].thisTheater.dimmer({
                closable: false
            });
        }
        
        console.log(components[theaterID]);
        
        components[theaterID].images_values = [];
        components[theaterID].images_array = [];
        
        if(components[theaterID].new_session) {initGame(theaterID);}
        
        $(this).parent().parent().parent().find('.image-flash .game-images .content').find('img').each(function(){
            components[theaterID].images_array.push($(this).attr('src'));
            if($(this).attr('flash-game-answer'))
                components[theaterID].images_values.push($(this).attr('flash-game-answer'));
        });
        
        if(components[theaterID].images_array.length != components[theaterID].images_values.length) {
            dialogCreator('Alert','Some images don\'t have answer value.', 'alert');
            return;
        }
        
        /* Loging */
        //console.log(images_array);
        //console.log(images_values);
        
        components[theaterID].timeout_val = $(this).parent().parent().parent().find('.image-flash #timeout').val();
        
        // Check if timeout sat.
        if(!components[theaterID].timeout_val) {
            dialogCreator('Alert','Please define timeout value first!', 'alert');
            return;
        }
        
        // Check if there is image.
        if(components[theaterID].images_array.length === 0) {
            dialogCreator('Alert', 'Please add at least one image!', 'alert');
            return;
        }
        
        if(!components[theaterID].new_session) {
            //$("body").html(components[theaterID].thisTheater.find('.center').html());return;
            components[theaterID].new_session = components[theaterID].thisTheater.find('.center').html();
        }
        
        if(components[theaterID].finishGame === true) {
            var th;
            if(components[theaterID].theaterCopy) {
                th = components[theaterID].theaterCopy.removeClass('ui page dimmer').show();
            } else {
                th = components[theaterID].thisTheater.clone().removeClass('ui page dimmer').show();
            }
            
            $(this).parent().parent().parent().empty().append(th);
        } else {
            components[theaterID].theaterCopy = components[theaterID].thisTheater.clone();
            components[theaterID].thisTheater.dimmer('show');
        }
        
        var progress = setInterval(function(){
            components[theaterID].thisTheater.find('.center').find('#prepare-progress-bar').progress('increment');
            if(components[theaterID].thisTheater.find('.indicating .progress').html() === "100%") {
                clearInterval(progress);
                setTimeout(function(){
                    components[theaterID].thisTheater.find('.center').empty();
                    var gameContainer = document.createElement('div');
                    $(gameContainer).addClass('ui orange inverted segment');
                    $(gameContainer).css({"width":"400px", "margin":"auto","min-height":"300px","position":"relative"});
                    var nextBtn = document.createElement('button');
                    $(nextBtn).addClass('ui button');
                    $(nextBtn).attr('id', 'next_image');
                    $(nextBtn).html("Next");
                    $(nextBtn).css({"position":"absolute","bottom":"10px","right":"10px"});
                    var images_container = document.createElement('img');
                    $(images_container).addClass('images_container ui medium circular image');
                    $(images_container).css({
                        'width':'250px',
                        'margin':'auto'
                    });
                    /*$(images_container).html('<i style="visibility: hidden;">info</i>');*/
                    
                    var answer_div = document.createElement('div');
                    var answer_input = document.createElement('input');
                    $(answer_div).addClass('ui input');
                    $(answer_input).attr({'id':'image_answer_field','placeholder':'Type answer here'});
                    $(answer_div).append(answer_input);
                    $(answer_div).css({'width':'250px','position':'absolute','left':'10px','bottom':'10px'});
                    
                    $(gameContainer).append(images_container).append(answer_div);
                    $(gameContainer).append(nextBtn);
                    
                    var alertArea = document.createElement('div');
                    $(alertArea).addClass('ui message');
                    $(alertArea).attr("id","alert_area");
                    $(alertArea).html('<i style="visibility: hidden;">info</i>');
                    $(alertArea).css({"width":"400px", "margin":"auto","position":"relative","margin-top":"10px","display":"block"});
                    
                    components[theaterID].thisTheater.find('.center').append(gameContainer).append(alertArea);
                    
                    /* Initialize player */
                    setTimeout(function(){
                        console.log(components[theaterID].constructor);
                        imagePlayer(components[theaterID].images_array[0], theaterID);
                    }, 1000);
                }, 1000);
            }
        }, 50);
    });
    
    $("body").on("click", ".layout .finish-game", function(){
        var theaterID = $(this).parent().parent().parent().parent().parent().find('.theater').attr('id');
        components[theaterID].finishGame = true;
        $(this).parent().find('.play-image').click();
    });
    
    /**
     * Handle next word process.
     */
    $("body").on("click", "#next_word", function(){
        var theaterID = $(this).parent().parent().parent().parent().parent().find('.theater').attr('id');
        
        var answer = $("#answer_field", components[theaterID].thisTheater).val();
        answer = answer.toLowerCase();
        if(answer.match(components[theaterID].text_sentences[components[theaterID].counter - 1].toLowerCase())){
            components[theaterID].thisTheater.find('.center').find('#alert_area').empty();
            components[theaterID].thisTheater.find('.center').find('#alert_area').removeClass('error');
            components[theaterID].thisTheater.find('.center').find('#alert_area').addClass('positive');
            components[theaterID].thisTheater.find('.center').find('#alert_area').html('<i class="thumbs outline up icon"></i>Your answer is correct');
            components[theaterID].answer_array.push(100);
            setTimeout(function(){
                components[theaterID].thisTheater.find('.center').find('#alert_area').html('<i style="visibility: hidden;">info</i>');
            }, 1500);
        } else {
            components[theaterID].thisTheater.find('.center').find('#alert_area').empty();
            components[theaterID].thisTheater.find('.center').find('#alert_area').removeClass('positive');
            components[theaterID].thisTheater.find('.center').find('#alert_area').addClass('error');
            components[theaterID].thisTheater.find('.center').find('#alert_area').html('<i class="thumbs outline down icon"></i>Wrong answer!');
            components[theaterID].answer_array.push(50);
            setTimeout(function(){
                components[theaterID].thisTheater.find('.center').find('#alert_area').html('<i style="visibility: hidden;">info</i>');
            }, 1500);
        }
        
        if(components[theaterID].counter > (components[theaterID].text_sentences.length - 1)) {
            components[theaterID].thisTheater.find('.center').empty();
            var final = document.createElement('div');
            $(final).css({"width":"400px", "margin":"auto","min-height":"200px","position":"relative","text-align":"center"});
            var content = '<div class="ui compact menu"><a class="item"><i class="icon thumbs outline down"></i> Wrong<div class="floating ui red label">' + (components[theaterID].answer_array.length - components[theaterID].answer_array.filter(getCorrect).length) + '</div></a><a class="item"><i class="thumbs outline up icon"></i> Correct<div class="floating ui teal label">' + components[theaterID].answer_array.filter(getCorrect).length + '</div></a></div>';
            $(final).append(content);
            $(final).append('<div style="margin-top: 50px;color: #FFF;font-size: 9pt;">Your flash is finished. Thank you for use. OOPSystems.com</div>');
            components[theaterID].thisTheater.find('.center').append(final);
            
            return;
        };
        var word = components[theaterID].text_sentences[components[theaterID].counter];
        player(word, theaterID);
    });
    
    /**
     * Handle next image
     */
    $("body").on("click", "#next_image", function(){
        var theaterID = $(this).parent().parent().parent().parent().parent().find('.theater').attr('id');

        var answer = $("#image_answer_field", components[theaterID].thisTheater).val();
        
        answer = answer.toLowerCase();
        
        if(answer.match(components[theaterID].images_values[components[theaterID].counter -1].toLowerCase())) {
            components[theaterID].thisTheater.find('.center').find('#alert_area').empty();
            components[theaterID].thisTheater.find('.center').find('#alert_area').removeClass('error');
            components[theaterID].thisTheater.find('.center').find('#alert_area').addClass('positive');
            components[theaterID].thisTheater.find('.center').find('#alert_area').html('<i class="thumbs outline up icon"></i>Your answer is correct');
            components[theaterID].answer_array.push(100);
            setTimeout(function(){
                components[theaterID].thisTheater.find('.center').find('#alert_area').html('<i style="visibility: hidden;">info</i>');
            }, 1500);
        } else {
            components[theaterID].thisTheater.find('.center').find('#alert_area').empty();
            components[theaterID].thisTheater.find('.center').find('#alert_area').removeClass('positive');
            components[theaterID].thisTheater.find('.center').find('#alert_area').addClass('error');
            components[theaterID].thisTheater.find('.center').find('#alert_area').html('<i class="thumbs outline down icon"></i>Wrong answer!');
            components[theaterID].answer_array.push(50);
            setTimeout(function(){
                components[theaterID].thisTheater.find('.center').find('#alert_area').html('<i style="visibility: hidden;">info</i>');
            }, 1500);
        }
        
        if(components[theaterID].counter > (components[theaterID].images_array.length - 1)) {
            if(components[theaterID].finishGame === false) {
                components[theaterID].thisTheater.find('.center').empty();
                var final = document.createElement('div');
                $(final).css({"width":"400px", "margin":"auto","min-height":"200px","position":"relative","text-align":"center"});
                var content = '<div class="ui compact menu"><a class="item"><i class="icon thumbs outline down"></i> Wrong<div class="floating ui red label">' + (components[theaterID].answer_array.length - components[theaterID].answer_array.filter(getCorrect).length) + '</div></a><a class="item"><i class="thumbs outline up icon"></i> Correct<div class="floating ui teal label">' + components[theaterID].answer_array.filter(getCorrect).length + '</div></a></div>';
                $(final).append(content);
                $(final).append('<div style="margin-top: 50px;color: #FFF;font-size: 9pt;">Your flash is finished. Thank you for use. OOPSystems.com</div>');
                components[theaterID].thisTheater.find('.center').append(final);
            } else {
                components[theaterID].thisTheater.find('.center').empty();
                components[theaterID].thisTheater.find('.center').html('<div style="margin-top: 50px;color: #000;font-size: 9pt;">Your flash is finished. Thank you for use. OOPSystems.com</div>');
            }
            
            return;
        };
        var image = components[theaterID].images_array[components[theaterID].counter];
        imagePlayer(image, theaterID);
    });
    
    /* To handle pressing Enter button when entering an answer. */
    $("body").on("keydown", "#answer_field", function(event){
        var theaterID = $(this).parent().parent().parent().parent().parent().parent().find('.theater').attr('id');
        
        if(event.which === 13) {
            $("#next_word", components[theaterID].thisTheater).click();
        }
    });
    
    $("body").on("keydown", "#image_answer_field", function(event){
        var theaterID = $(this).parent().parent().parent().parent().parent().parent().find('.theater').attr('id');
        
        if(event.which === 13) {
            $("#next_image", components[theaterID].thisTheater).click();
        }
    });
    
    /**
     * File uploader handler.
     */
    $("body").on("click", "#image-file-placeholder", function(){
        $("#image-file-input").click();
    });
    
    $("body").on("change", "#image-file-input", function(){
        filesUploader(this, 'assets\\games\\images\\flash-images');
    });
    
    /**
     * Preview image in file.
     */
    $("body").on("mouseover", ".file-div", function(){
        var imgSrc = $('img', this).attr('src');
        $(".image-thumbs").find('img').attr('src', imgSrc);
        $(".image-thumbs").show();
    });
    
    $("body").on("mouseout", ".file-div", function(){
        $(".image-thumbs").hide();
    });
    
    $("body").on("click", ".file-div", function() {
        var answerVal = prompt('Enter desired answer for this image.','');
        if(answerVal) {
            $(this).find('img').attr('flash-game-answer', answerVal);
            $(this).addClass('armed');
        } /*else {
            $(this).find('img').removeAttr('flash-game-answer');
            $(this).removeClass('armed');
        }*/
    });
});