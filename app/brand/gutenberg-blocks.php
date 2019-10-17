<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;


add_action( 'carbon_fields_register_fields', 'prosvit_carbon_fields_register_fields' );

function prosvit_carbon_fields_register_fields() {

    Block::make( 'Hero Section' )
        ->add_fields( array(
            Field::make( 'separator', 'hh_separator', 'Home Hero' ),
            Field::make( 'rich_text', 'hh_content', 'Hero Content' ),
            Field::make( 'image', 'hh_background_image', 'Background Image' )
                ->set_value_type( 'id' )
                ->set_type( 'image' ),
        ) )
        ->set_category( 'prosvit' )
        ->set_render_callback( function ( $fields, $attributes, $content ) {
            $section_class = array( 'section', 'section-hero section--fullscren' );
            if( isset($attributes['className']) ) {
                array_push($section_class, $attributes['className']);
            }
            ?>
            <section class="<?php echo implode(" ", $section_class) ?>">

                <?php if (isset($fields['hh_background_image'])) { ?>
                <div class="section__background">
                    <?php echo wp_get_attachment_image( $fields['hh_background_image'], 'background-half', "", array( "class" => "img-fluid section__backgroundimage" ) );  ?>
                </div>
                <?php } ?>

                <div class="container">
                    <?php
                        if( !empty( $fields['hh_content'] ) ){
                            echo $fields['hh_content'];
                        }
                    ?>
                </div>
            </section>
            <?php
        } );

    /*
    Block::make( 'Test Section' ) // Називаємо новий блок - приклад Slider
        ->add_fields( array(
            Field::make( 'separator', 'hh_separator', 'Test' ), // Називаємо новий блок - приклад Slider Full Width
        ) )
        ->set_category( 'prosvit' )
        ->set_render_callback( function ( $fields, $attributes, $content ) {
            $section_class = array( 'section', 'section-test' ); // Задаємо власний клас - приклад Slider Full Width
            if( isset($attributes['className']) ) {
                array_push($section_class, $attributes['className']);
            }
            ?>
            <section class="<?php echo implode(" ", $section_class) ?>">

                <!-- Сюди вставляємо raw html code і віддаєм бекендам -->

            </section>
            <?php
        } );
    */

    Block::make( 'Section_4' ) // Називаємо новий блок - приклад Slider
        ->add_fields( array(
            Field::make( 'separator', 'hh_separator', 'Section_4' ), // Називаємо новий блок - приклад Slider Full Width
        ) )
        ->set_category( 'prosvit' )
        ->set_render_callback( function ( $fields, $attributes, $content ) {
            $section_class = array( 'section', 'section_4' ); // Задаємо власний клас - приклад Slider Full Width
            if( isset($attributes['className']) ) {
                array_push($section_class, $attributes['className']);
            }
            ?>
            <section class="<?php echo implode(" ", $section_class) ?>" style="background-color: #000;">
                <div class="container">
                    <div class="row instructors_title">
                        <div class="col">
                            <h1 class="title">INSTRUCTORS</h1>
                            <h5 class="really_about">they’ll show you what redemption is really about</h5>
                        </div>
                    </div>   
                    <div class="row instructor_photo">
                        <div class="col-md-3">
                            <img class="zoom_img"src="/wp-content/uploads/2019/10/Maria.png" alt="image" style="width: 100%;">
                            <!-- <a href="#">BOOK A SESSION</a>
                            <a href=#>VISIT PROFILE</a> -->
                        </div>
                        <div class="col-md-3">
                            <img class="zoom_img" src="/wp-content/uploads/2019/10/Maria.png" alt="image" style="width: 100%;">
                        </div>
                        <div class="col-md-3">
                            <img class="zoom_img" src="/wp-content/uploads/2019/10/Maria.png" alt="image" style="width: 100%;">
                        </div>
                        <div class="col-md-3">
                            <img  class="zoom_img" src="/wp-content/uploads/2019/10/Maria.png" alt="image"  style="width: 100%;">
                        </div>
                        <!-- <div class="btn_all">
                            <a class="view_all" href="#">VIEW ALL</a>
                        </div> -->
                        
                    </div>
                    
                </div>
                <div class="btn_all">
                    <a class="view_all" href="#">VIEW ALL</a>
                </div>
                
            </section>
            <?php
        } );

        Block::make( 'Section_5' ) // Називаємо новий блок - приклад Slider
        ->add_fields( array(
            Field::make( 'separator', 'hh_separator', 'Section_5' ), // Називаємо новий блок - приклад Slider Full Width
        ) )
        ->set_category( 'prosvit' )
        ->set_render_callback( function ( $fields, $attributes, $content ) {
            $section_class = array( 'section', 'section_5' ); // Задаємо власний клас - приклад Slider Full Width
            if( isset($attributes['className']) ) {
                array_push($section_class, $attributes['className']);
            }
            ?>
            <section class="<?php echo implode(" ", $section_class) ?>" style="background-color: #000;">

                <div class="container">
                    <div class="row nevada_title">
                        <div class="col-md-6 redemption_speaks">
                            <h1 class="title">REDEMPTION <br> SPEAKS</h1>
                                <img src="/wp-content/uploads/2019/10/soc.png" alt="image">
                        </div>
                        <div class="col-md-4 redemption_speaks">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
                    </div>
                    <div class="row nevada_wrapper">
                        <div class="col-md-4 ">
                             <img class="nevada_img" src="/wp-content/uploads/2019/10/Nevada.png" alt="image">
                             <div class="infonrmation">
                                <h5>NEVADA</h5>
                                <h2>LAS VEGAS</h2>
                                <p>
                                    Your best offense is your best defense.
                                    Inside this article, it gives you the best
                                    ways to get into your block position.
                                </p>
                             </div>
                             
                            <a class="" href="#">VIEW ARTICLE</a>
                        </div>
                        <div class="col-md-4">
                            <img class="nevada_img" src="/wp-content/uploads/2019/10/Nevada.png" alt="image">
                            <div class="infonrmation">
                                <h5>NEVADA</h5>
                                <h2>LAS VEGAS</h2>
                                <p>
                                    Your best offense is your best defense.
                                    Inside this article, it gives you the best
                                    ways to get into your block position.
                                </p>
                             </div>
                            <a href="#">VIEW ARTICLE</a>
                        </div>
                        <div class="col-md-4">
                             <img class="nevada_img" src="/wp-content/uploads/2019/10/Nevada.png" alt="image">
                             <div class="infonrmation">
                                <h5>NEVADA</h5>
                                <h2>LAS VEGAS</h2>
                                <p>
                                    Your best offense is your best defense.
                                    Inside this article, it gives you the best
                                    ways to get into your block position.
                                </p>
                             </div>
                            <a href="#">VIEW ARTICLE</a>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="btn_all">
                    <a class="view_all" href="#">VIEW ALL</a>
                </div>

            </section>
            <?php
        } );

        Block::make( 'Section_6' ) // Називаємо новий блок - приклад Slider
        ->add_fields( array(
            Field::make( 'separator', 'hh_separator', 'Section_6' ), // Називаємо новий блок - приклад Slider Full Width
        ) )
        ->set_category( 'prosvit' )
        ->set_render_callback( function ( $fields, $attributes, $content ) {
            $section_class = array( 'section', 'section_6' ); // Задаємо власний клас - приклад Slider Full Width
            if( isset($attributes['className']) ) {
                array_push($section_class, $attributes['className']);
            }
            ?>
            <section class="<?php echo implode(" ", $section_class) ?>" style="background-color: #000;">

            <div class="line"></div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6 follow_us">
                        <h1>FOLLOW US</h1>
                        <h5>they’ll show you <br>whatredemption is really about</h5>
                    </div>
                    <div class="col-md-6 spotligth">
                        <h1>SPOTLIGTH</h1>
                        <h5>tag #trainharder or <br> #hiititharder to be featured</h5>
                    </div>
                </div>
            </div>

            <div class="wrapper_content">
                <img src="/wp-content/uploads/2019/10/img1.png" alt="image" style="width: 98%; height: 100%;">
                <img src="/wp-content/uploads/2019/10/img2.png" alt="image" style="width: 100%; height: 100%;">
                <img src="/wp-content/uploads/2019/10/img3.png" alt="image" style="width: 100%; height: 100%;">
                <img src="/wp-content/uploads/2019/10/img4.png" alt="image" style="width: 100%; height: 100%;">
                <img src="/wp-content/uploads/2019/10/img5.png" alt="image" style="width: 81%; height: 100%;">
            </div>
            <div class="line_before_content"></div>
            <div class="container">
                <div class="row">
                    <div class="col text_before_content">
                        <h1>
                            BE THE FIRST IN THE KNOW
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 conect">
                        <h2>
                            EMAIL ADDRESS
                        </h2>
                    </div>
                    <div class="col-md-6 conect">
                        <h2>
                            SUBSCRIBE
                        </h2>
                    </div>
                    
                </div>
                <div class="red_line"></div>
            </div>


            

            </section>
            <?php
        } );

}


