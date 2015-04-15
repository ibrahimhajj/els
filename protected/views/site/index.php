<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>
<div id="object-settings" class="ui vertical menu" style="position: fixed;right: 10px;bottom: 30px;z-index: 104;display: none;">
  <div class="header item">
    Settings
    <i class="unhide icon" style="float: right;cursor: pointer" onclick="$(this).parent().parent().fadeToggle();"></i>
  </div>
  <div class="item">
    HTML Settings
    <div class="menu">
      <a class="item">Width</a>
      <a class="item">Height</a>
      <a class="item">Position</a>
    </div>
  </div>
  <a class="item">
    Add new attribute
  </a>
  <a class="item">
    Remove attribute
  </a>
  <div class="header item">
    Tracking events
  </div>
  <a class="item">
    On start
  </a>
  <a class="item">
    On Finish
  </a>
  <a class="item">
    On Success
  </a>
  <div class="header item">
    Support
  </div>
  <a class="item">
    FAQ
  </a>
  <a class="item">
    E-mail Support
  </a>
</div>


<div id="statusbar" class="ui purple segment" style="z-index: 103;">
    <div style="float: right; border-left: 2px solid #73337D; padding-left: 10px; width: 120px;">
        X: <span id="x-mouse-event">000</span> Y: <span id="y-mouse-event">000</span>
    </div>
    
    <div class="ui ordered steps" style="display: none;">
        <div class="completed step">
          <div class="content">
            <div class="title">Load models</div>
            <div class="description">All API models are loaded.</div>
          </div>
        </div>
        <div class="completed step">
          <div class="content">
            <div class="title">Generate workspace.</div>
            <div class="description">Generating workspace done.</div>
          </div>
        </div>
        <div class="disabled step">
          <div class="content">
            <div class="title">Build activity</div>
            <div class="description">...</div>
          </div>
        </div>
    </div>
</div>

<div id="main-left-menu" class="ui left vertical inverted labeled icon sidebar menu">
  <a class="item">
    <i class="block layout icon"></i>
    Test
  </a>
  <a class="item">
    <i class="calendar icon"></i>
    History
  </a>
  <a class="item">
    <i class="bug icon"></i>
    Debugging
  </a>
  <a class="item">
    <i class="external icon"></i>
    Plugins
  </a>
  <a class="item">
    <i class="shop icon"></i>
    Store
  </a>
  <a class="item">
    <i class="settings icon"></i>
    Settings
  </a>
</div>

<div class="image-thumbs ui black segment" style="display: none;z-index: 1000;">
    <img style="width: 100%;border-radius: 4px;" src="" />
</div>
<div class="th">
<div class="theater ui dimmer toclone" style="display: none;">
    <div class="content">
        <i class="white close icon close-dim" style="z-index: 1000;position: absolute;top: 5px;left: 5px;cursor: pointer;"></i>
        <div class="center">
            <?php echo Yii::t('string', 'Loading game...');?>
            <div id="prepare-progress-bar" class="ui indicating progress" style="width: 300px; margin: auto;">
                <div class="bar">
                    <div class="progress"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Tools to add -->
<div id="tools" class="ui blue inverted segment stacked">
    <div class="ui green button play-all" style="float: right;"><?php echo Yii::t('string', 'Play');?></div>
    <div id="sidebar-btn" class="ui green button" style="float: right;"><?php echo Yii::t('string', 'Sidebar');?></div>
    <i class="spinner big loading icon play-all-loading" style="float: right;margin-top: 5px;display: none;"></i>

    <!-- List of components -->
    <div class="component">
        <div class="drag"><i class="move icon"></i><?php echo Yii::t('string', 'Flash');?></div>
        <div class="config">
            <i class="remove white circle icon"></i>
            <i class="add white circle icon"></i>
            <i class="setting white icon"></i>
        </div>
        <div class="ibh-container ui button">
            <div class="caption"><i class="inbox icon"></i><?php echo Yii::t('string', 'Flash');?></div>
            <div class="data flash-engin">
                <div class="configuration" style="float: right; display: none;">
                    <div class="ui buttons">
                        <div class="ui button empty-sentence-area"><?php echo Yii::t('string', 'Clear');?></div>
                        <div class="<?php echo Yii::t('string', 'or');?>"></div>
                        <div class="ui orange button play-sentence"><?php echo Yii::t('string', 'Try');?></div>
<!--                        <div class="<?php echo Yii::t('string', 'or');?>"></div>
                        <div class="ui green button finish-game"><?php echo Yii::t('string', 'Ready');?></div>-->
                    </div>
                </div>
                <div class="configuration-image" style="float: right; display: none;">
                    <div class="ui buttons">
                        <div class="ui button empty-image-area"><?php echo Yii::t('string', 'Clear');?></div>
                        <div class="<?php echo Yii::t('string', 'or');?>"></div>
                        <div class="ui orange button play-image"><?php echo Yii::t('string', 'Try');?></div>
<!--                        <div class="<?php echo Yii::t('string', 'or');?>"></div>
                        <div class="ui green button finish-game"><?php echo Yii::t('string', 'Ready');?></div>-->
                    </div>
                </div>
                <select id="" class="ui dropdown">
                    <option><?php echo Yii::t('string', "Choose from menu");?></option>
                    <option value="1"><?php echo Yii::t('string', "Image flash");?></option>
                    <option value="2"><?php echo Yii::t('string', "Text flash");?></option>
                </select>
                <div class="ui icon input">
                    <input id="startpointtime" class="number" style="width: 155px;" type="text" placeholder="<?php echo Yii::t('string', 'Start point time');?>">
                    <i class="wait icon"></i>
                </div>
                <div class="content ui purple message" style="min-height: 100px; min-width: 600px;">
                    <div class="text-flash" style="display: none;">
                        <div class="ui icon input" style="float: right;">
                            <input id="timeout" class="number" style="width: 110px;" type="text" placeholder="<?php echo Yii::t('string', 'Timeout');?>">
                            <i class="wait icon"></i>
                        </div>
                        <form id="flash-game-form" name="flash-game-form" method="post" style="">
                            <div class="ui icon input">
                                <input id="sentence-text" type="text" placeholder="<?php echo Yii::t('string', 'Sentence');?>">
                                <i class="write icon"></i>
                            </div>
                            <button type="submit" class="ui primary button"><i class="plus icon"></i><?php echo Yii::t('string', 'Add');?></button>
                        </form>
                        <div class="ui horizontal divider"><?php echo Yii::t('string', 'Sentences');?></div>
                        <div id="sentences" style="overflow: auto;">
                            
                        </div>
                    </div>
                    <div class="image-flash" style="display: none; overflow: auto;overflow: hidden ;width: 650px;">
                        <div class="ui icon input" style="margin-bottom: 5px; width: 100%;">
                            <input id="timeout" class="number" style="width: 110px;" type="text" placeholder="<?php echo Yii::t('string', 'Timeout');?>">
                            <i class="wait icon"></i>
                        </div>
                        <div class="ui segment" style="width: 47%;float: left;margin: 0;">
                            <i id="image-file-placeholder" style="cursor: pointer;" class="upload large icon"></i>
                            <div style="float: right;">
                                <i class="setting large icon"></i>
                                <i class="bug large icon"></i>
                            </div>
                            <input accept="image/*" style="display: none;" type="file" id="image-file-input" name="image-file-input" />
                            <div class="ui horizontal divider">Files</div>
                            <div id="all_image_files" style="word-break: break-all;overflow: auto">
                                
                            </div>
                        </div>
                        <div id="game-images" class="ui segment game-images" style="width: 47%;float: right;margin: 0;">
                            <div class="ui pointing below label" style="width: 100%; text-align: center">Click on images and enter answer.</div>
                            <div class="content" style="min-height: 50px;">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    
    <div class="component">
        <div class="drag"><i class="move icon"></i><?php echo Yii::t('string', 'Highlight');?></div>
        <div class="config">
            <i class="remove white circle icon"></i>
            <i class="add white circle icon"></i>
        </div>
        <div class="ibh-container ui button">
            <div class="caption"><i class="h icon"></i><?php echo Yii::t('string', 'Highlight');?></div>
            <div class="data flash-engin">
                
            </div>
        </div>
    </div>
    
    <div class="component">
        <div class="drag"><i class="move icon"></i><?php echo Yii::t('string', 'Search');?></div>
        <div class="config">
            <i class="remove white circle icon"></i>
            <i class="add white circle icon"></i>
        </div>
        <div class="ibh-container ui button">
            <div class="caption"><i class="search icon"></i><?php echo Yii::t('string', 'Search');?></div>
            <div class="data flash-engin">
                
            </div>
        </div>
    </div>
    
    <div class="component">
        <div class="drag"><i class="move icon"></i><?php echo Yii::t('string', 'Presentation');?></div>
        <div class="config">
            <i class="remove white circle icon"></i>
            <i class="add white circle icon"></i>
        </div>
        <div class="ibh-container ui button">
            <div class="caption"><i class="announcement icon"></i><?php echo Yii::t('string', 'Presentation');?></div>
            <div class="data flash-engin">
                
            </div>
        </div>
    </div>
    
    <div class="ui dropdown item segment white" id="mortools" style="float: left;margin: 0;height: 35px;padding: 8px 10px;background: #E0E0E0;">
      More tools
      <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item">Translate</a>
        <a class="item">Generate code</a>
        <a class="item">Save</a>
        <a class="item">Save in database</a>
      </div>
    </div>
</div>

<!-- Edit layer -->
<div id="layout" class="layout">
    
</div>

<!-- Script portion -->

<script>
    var theaterCounter = 0;
    
    function timeOutSetter() {
        var args = arguments;
        var startpoint = setTimeout(function(){
            console.log(args[0]);
            $("#layout .component").filter(":nth-child(" + args[0] + ")").find(".play-sentence:visible").click();
            $("#layout .component").filter(":nth-child(" + args[0] + ")").find(".play-image:visible").click();
            
            $(".play-all-loading").hide();
            clearTimeout(startpoint);
        }, args[1] * 1000);
        
//        $("#layout .component").filter(":nth-child(" + (arguments[0] + 1) + ")").find(".play-sentence:visible").click();
//        $("#layout .component").filter(":nth-child(" + (arguments[0] + 1) +  ")").find(".play-image:visible").click();
    }
    
    function handleSettingSideBar() {
        
    }
    
    /**
     * Get file icon upon it's type.
     * @param {type} filename
     * @returns {undefined}
     */
    function fileIcon(filename) {
        var returnedType;
        var types = {
            '.jpg':'<i class="file big image outline icon"></i>',
            '.gif':'<i class="file big image outline icon"></i>',
            '.png':'<i class="file big image outline icon"></i>',
            '.jpeg':'<i class="file big image outline icon"></i>',
            '.mp4':'<i class="file big video outline icon"></i>',
            '.wmv':'<i class="file big video outline icon"></i>'
        };
        
        for(var type in types) {
            if(filename.indexOf(type) > 0) {
                //console.log(types[type]);
                returnedType = types[type];
                break;
            }
        }
        
        return returnedType;
    }
    
    /**
     * @param {type} input
     * @param {type} dest
     * @returns {undefined}
     */
    function filesUploader(input, dest) {
        var formData = new FormData();
        formData.append('file', input.files[0]);
        formData.append('dest', dest);
        
        var uploader = $.ajax({
            url: "<?php echo Yii::app()->createUrl('site/uploader');?>",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success: function(data){
                console.log(data);
            }
        });

        uploader.fail(function(){
            console.log("Failed to upload file");
        });
    }
    
    /**
     * @param {type} dest Destination folder to upload files to.
     * @param {type} div  Div to load files names in.
     * @param {type} divToDropIn Div to make sortable and drag files in.
     * @returns {undefined}     */
    function filesLoader(dest, div, divToDropIn) {
        if($(div).children().length > 0)
            return;
        
        var files = [];
        var url = dest.replace('\\', '/');
        $(div).addClass('loader-source-div');
        var sourceDiv = '.loader-source-div';
        
        var loader = $.post(
            "<?php echo Yii::app()->createUrl('site/loader'); ?>",
            {"dest":dest},
            function(result) {
                
                var fileRead = JSON.parse(result);
                for(var i=0; i < fileRead.length; i++) {
                    files[i] = fileRead[i];
                    
                    var fileContainerDiv = document.createElement('div'); // file object container.
                    var fileIconDiv = document.createElement('div'); // file icon container.
                    $(fileIconDiv).append(fileIcon(fileRead[i]));
                    $(fileIconDiv).css({
                        'text-align':'center',
                        'margin-bottom':'3px'
                    });
                    
                    $(fileContainerDiv).addClass('file-div');
                    $(fileContainerDiv).css({
                        'width':'50px',
                        'height':'65px',
                        'word-break':'break-all',
                        'overflow':'hidden',
                        'float':'left',
                        'margin-right':'5px',
                        'border':'2px solid #DDDDDD',
                        'margin-top':'5px',
                        'padding':'3px',
                        'box-sizing':'border-box',
                        'font-size':'8pt',
                        'cursor':'pointer',
                        'border-radius':'4px',
                        'background':'#FFF',
                        'z-index':'5'
                    });
                    
                    $(fileContainerDiv).append(fileIconDiv);
                    $(fileContainerDiv).append(fileRead[i]);
                    
                    var img = document.createElement('img');
                    $(img).attr('src', '<?php echo Yii::app()->baseUrl;?>/' + url + '/' + fileRead[i]);
                    $(img).css({
                        'display':'none'
                    });
                    $(fileContainerDiv).append(img);
                    
                    $(div).append(fileContainerDiv);
                    
                    if(divToDropIn){
                        $(div).sortable({
                            placeholder: 'sortable-file-placeholder',
                            connectWith: divToDropIn,
                        });

                        $(div).parent().parent().find(divToDropIn).sortable({
                            placeholder: 'sortable-file-placeholder',
                            connectWith: sourceDiv,
                            update: function() {
                                // Do something.
                            }
                        });
                    }
                    
                }
                
                //console.log(files);
                //$(div).append(files);
            }
        );

        loader.fail(function(){
            console.log("Failed to upload file");
        });
    }
    
    
    /**
     * Set globals.
     * @returns {undefined}
     */
    function setGlobals() {
//        $(".ibh-draggable").draggable({
//            handle: '.drag'
//        });
        
    }
    
    $(document).ready(function(){
            
        var can_drag = 0;
        var flash = [];
        
        $("#layout").droppable({
            activeClass: "ui-state-highlight",
            over: function(event, ui) {
                can_drag = 1;
            },
            out: function(event, ui) {
                can_drag = 0;
            },
            drop: function(event, ui) {
                console.log(ui.draggable.attr('class'));
                can_drag = 1;
            }
        });
        
        $("#layout").sortable({
            placeholder: "sortable-placeholder"
        });
        
         $("#tools .component").draggable({
            revert: true,
            start: function(){
                //console.log(thbody.attr('class'));
            },
            stop: function(){
                if(can_drag === 0){
                    console.log(can_drag);
                    return;
                }
                
                var thbody = $('.th .theater').clone();
                var component = $(this).clone();
                /* Initialize componenet */
                $(component).find('.ibh-container').removeClass('ui button');
                //$(component).addClass('ibh-draggable');
                //$(component).draggable({handle: '.drag', containment: 'parent', snap: true});
                //$(component).resizable({containment: 'parent'});
                $(component).addClass('gradeint-background');
//                $(component).css({"position":"absolute"});
                $(component).css({
                    "margin-top":"5px"
                });
                
                thbody.removeClass('toclone');
                thbody.attr('id', 'theater-' + theaterCounter);
                $(component).append(thbody);
                
                $(component).find('.ui.dropdown').dropdown();

                /* Append component to layout */
                $('#layout').append(component);
                handleSettingSideBar();
                //thbody.removeClass('theater-' + theaterCounter);
                theaterCounter++;
                can_drag = 0;
                
            }
        });
        
        /**
         * Add component to layout.
         * & Initialize the component after appending.
         */
        $("#tools .component").on("mousedown", function(){
            /* You can put this in mouseup event of .component & change event to click to back
             * to clicking mode not drag and drop mode. but remember to remove droppable method 
             * of layout. also remove this event mousedown of .compnent & u have to delete
             * can_drag condition in .compnent click event after changing. */
            
        });
        
//        $("#tools .component").draggable({
//            
//        });
//        $("#tools .component").on("mouseup", function(){
//            
//        });
        
        /**
         * Initialize component when focus in layout
         */
        $("body").on("click, mousedown", "#layout .drag", function(){
            $("#layout .component").css({"z-index":"49"});
            $(this).parent().css({"z-index":"50"});
        });
        
        /**
         * Save position of component after drop
         */
        $("body").on("mouseup", "#layout .drag", function(){
            $(this).parent().css({"position":"absolute"});
        });
        
        /**
         * Handle comfig buttons.
         */
        $("body").on("click", ".config .remove", function(){
            if(confirm('<?php echo Yii::t('string', 'Are you sure to delete this component?');?>'))
                $(this).parent().parent().remove();
        });
        
        $("body").on("click",".close-dim",function(){
            $(this).parent().parent().parent().find("#sentences").attr('style', 'overflow: auto;');
            var theaterID = $(this).parent().parent().parent().find('.theater').attr('id');
            components[theaterID].thisTheater.dimmer('hide');
        });
        
        $("body").on("click", ".component", function(){
            $("#layout .component").css({'z-index':'49'});
            $(this).css({'z-index':'50'});
        });
        
        /**
         * Play all games.
         */
        $(".play-all").click(function(){
            console.clear();
            $(".play-all-loading").show();
            $("#layout .component").each(function(){
                var startpoint = $(this).find('#startpointtime').val();
                if(startpoint) {
                    $(this).find('.close').hide();
                    if($('.play-sentence:visible', this).length > 0) {
                        $(this).attr('style', 'width: 420px !important;height: 400px !important;float: left !important;margin-left: 5px;margin-top: 5px;');
                    } else {
                        $(this).attr('style', 'width: 420px !important;height: 400px !important;float: left !important;margin-left: 5px;margin-top: 5px;');
                    }
                    
                    $("#sentences", this).attr('style', 'overflow: auto; filter: blur(4px);-webkit-filter: blur(4px);-moz-filter: blur(4px);');
                    $(".ibh-container", this).attr('style', 'visibility: hidden;');
                    timeOutSetter($(this).index() + 1, startpoint);
                } else {
                    console.log('Not all games started, define start point time');
                }
            });
        });
        
        $('#main-left-menu').sidebar({
            dimPage: false
        });
        
        // showing multiple
        $('#main-left-menu').sidebar('setting', 'transition', 'overlay').sidebar('toggle');

        /**
        * Show and hide sidebar.
         */
        $("#sidebar-btn").click(function(){
            $('#main-left-menu').sidebar('setting', 'transition', 'overlay').sidebar('toggle');
        });
        
        $("body").on("mousemove", function(event){
            $("#x-mouse-event").html(event.pageX);
            $("#y-mouse-event").html(event.pageY);
        });
        
        $("#mortools").dropdown();
        
        $("body").on("click", ".config .setting", function(){
            $("#object-settings").fadeToggle();
        });
    });
</script>