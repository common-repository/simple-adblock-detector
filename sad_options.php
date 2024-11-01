<?php

function update_sad_post_info() {
    add_option( 'sad_post_title', "We've noticed that you are using an AdBlocker.");
    add_option( 'sad_post_animation', "animate__backInUp");
    add_option( 'sad_post_devtools', "yes");
    add_option( 'sad_post_description', "We are working really hard to provide you the best content for free. We promise that we won't show you annoying ads, please consider disabling AdBlock and Refresh.");
    register_setting( 'sad-post-settings', 'sad_post_title' );
    register_setting( 'sad-post-settings', 'sad_post_animation' );
    register_setting( 'sad-post-settings', 'sad_post_devtools' );
    register_setting( 'sad-post-settings', 'sad_post_description' );

  }
    
function sad_register_options_page() {
		add_menu_page( 'Simple AdBlock Detector', 'Simple AdBlock Detector', 'manage_options', 'Simple-adBlock-Detector', 'sad_options_page', plugins_url( 'simple-adblock-detector/img/ico.png'));
        add_action( 'admin_init', 'update_sad_post_info' );
    }
      
       
	add_action( 'admin_menu', 'sad_register_options_page' );

	function sad_options_page() {
        wp_enqueue_style( 'sad-admin', plugins_url( '/css/admin.min.css', __FILE__ ), false, 1, 'all' );

?>
<div class="top-sad">
    <ul>
        <li> <img alt="Simple AdBlock Detector" src="<?php echo plugins_url("/img/sad.png",__FILE__) ?>" /> </li>
        <li><a rel="noopener" target="_blank" id="donate" href="https://www.paypal.me/jarouih">Donate and keep all my
                plugins &
                updates
                free 🔥</a></li>
    </ul>
</div>

<div class="main">
    <div class="mainContent clearfix">

        <form method="post" action="options.php">
            <div>
                <?php settings_fields( 'sad-post-settings' ); ?>
                <?php do_settings_sections( 'sad-post-settings' ); ?>


                <div class="widget-box">

                    <div class="rown">

                        <label for="sad_post_title">Title </label>

                        <input value="<?php echo get_option( 'sad_post_title' );?>" name="sad_post_title" type="text">
                    </div>
                    <div class="rown">
                        <label for="sad_post_animation">Disabling access to devtools and context menu (Mac &
                            Windows)</label> <br />
                        <div class="group">
                            <input type="radio" value="no" name="sad_post_devtools" id="devtools"
                                <?php if(get_option('sad_post_devtools')=='no') { echo "checked"; } ?>>
                            NO<br />
                            <input type="radio" value="yes" name="sad_post_devtools" id="devtools"
                                <?php if(get_option('sad_post_devtools')=='yes') { echo "checked"; }  ?>>
                            YES <br />
                        </div>

                        <div class="rown">
                            <label for="sad_post_animation">Animation </label>

                            <select value="<?php echo get_option( 'sad_post_animation' );?>" name="sad_post_animation">
                                <option value="animate__slideInDown">slideInDown</option>
                                <option value="animate__slideInLeft">slideInLeft</option>
                                <option value="animate__slideInRight">slideInRight</option>
                                <option value="animate__slideInUp">slideInUp</option>
                                <option value="animate__fadeIn">fadeIn</option>
                                <option value="animate__fadeInUp">fadeInUp</option>
                                <option value="animate__fadeInDown">fadeInDown</option>
                                <option value="animate__fadeInLeft">fadeInLeft</option>
                                <option value="animate__fadeInDownBig">fadeInDownBig</option>
                                <option value="animate__fadeInRight">fadeInRight</option>
                                <option value="animate__backInLeft">BackInLeft</option>
                                <option value="animate__backInRight">BackInRight</option>
                                <option value="animate__backInUp">BackInUp</option>
                                <option value="animate__backInDown">BackDown</option>
                                <option value="animate__zoomIn">ZoomIn</option>
                                <option value="animate__zoomDown">ZoomDown</option>
                                <option value="animate__zoomUp">ZoomUp</option>


                            </select>
                        </div>
                        <div class="rown">

                            <label for="sad_post_description">Description</label>
                            <textarea style="padding:15px;" name="sad_post_description" cols="30"
                                rows="10"><?php echo get_option( 'sad_post_description' ); ?></textarea>
                        </div>

                        <input type="submit" id="submit" class="submit" value="Save changes">

                    </div>


                </div>

        </form>

    </div>

    <?php
	}

?>