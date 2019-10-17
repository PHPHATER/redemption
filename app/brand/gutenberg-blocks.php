<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;


add_action('carbon_fields_register_fields', 'prosvit_carbon_fields_register_fields');

function prosvit_carbon_fields_register_fields()
{

    Block::make('Hero Section')
        ->add_fields(array(
            Field::make('separator', 'hh_separator', 'Home Hero'),
            Field::make('rich_text', 'hh_content', 'Hero Content'),
            Field::make('image', 'hh_background_image', 'Background Image')
                ->set_value_type('id')
                ->set_type('image'),
        ))
        ->set_category('prosvit')
        ->set_render_callback(function ($fields, $attributes, $content) {
            $section_class = array('section', 'section-hero section--fullscren');
            if (isset($attributes['className'])) {
                array_push($section_class, $attributes['className']);
            }
            ?>
            <section class="<?php echo implode(" ", $section_class) ?>">

                <?php if (isset($fields['hh_background_image'])) { ?>
                    <div class="section__background">
                        <?php echo wp_get_attachment_image($fields['hh_background_image'], 'background-half', "", array("class" => "img-fluid section__backgroundimage")); ?>
                    </div>
                <?php } ?>

                <div class="container">
                    <?php
                    if (!empty($fields['hh_content'])) {
                        echo $fields['hh_content'];
                    }
                    ?>
                </div>
            </section>
            <?php
        });

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

<<<<<<< HEAD
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
=======

    Block::make('Home Section-1') // Називаємо новий блок - приклад Slider
    ->add_fields(array(
        Field::make('separator', 'hh_separator', 'Home-section1'), // Називаємо новий блок - приклад Slider Full Width
    ))
        ->set_category('prosvit')
        ->set_render_callback(function ($fields, $attributes, $content) {
            $section_class = array('section', 'home--section1'); // Задаємо власний клас - приклад Slider Full Width
            if (isset($attributes['className'])) {
                array_push($section_class, $attributes['className']);
            }
            ?>
            <section class="<?php echo implode(" ", $section_class) ?>">
                <div class="home-sect1-content">
                    <h1>3 CONCEPTS:</h1>
                    <h1>RIDE + REP + REBEL</h1>
                    <h3>TRAIN HARDER</h3>
                    <button><p>BOOK SESSION</p></button>
                    <div class="sect1-bottom-part">
                        <div class="sect1-bottom-part-one">
                            <p>1</p>
                            <p>TRAIN</p>
                            <p>HARDER</p>
                        </div>
                        <div>
                            <p>2</p>
                            <p>RIDE</p>
                        </div>
                        <div>
                            <p>3</p>
                            <p>REP</p>
                        </div>
                        <div>
                            <p>4</p>
                            <p>REBEL</p>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        });

    Block::make('Home section-2') // Називаємо новий блок - приклад Slider
    ->add_fields(array(
        Field::make('separator', 'hh_separator', 'Home-section2'), // Називаємо новий блок - приклад Slider Full Width
    ))
        ->set_category('prosvit')
        ->set_render_callback(function ($fields, $attributes, $content) {
            $section_class = array('section', 'section home--section2'); // Задаємо власний клас - приклад Slider Full Width
            if (isset($attributes['className'])) {
                array_push($section_class, $attributes['className']);
            }
            ?>
            <section class="<?php echo implode(" ", $section_class) ?>">

                <div class="home-sect2-content">
                    <div class="home-sect2-top-part">
                        <h1>CONCEPTS</h1>
                        <h3>OUR KIND OF 3-WAY</h3>
                    </div>
                    <div class="home-sect2-next-part">
                        <div class="home-sect2-next-part-one">
                            <h1>RIDE</h1>
                            <p>We like it rough and we like it fast. This 45-minute cycle concept is packed with 10
                                rounds of cycle, weights, and HIIT training.</p>
                            <button>Book a session</button>
                            <button>explore ride</button>
                        </div>
                        <div class="home-sect2-next-part-two">
                            <h1>REP</h1>
                            <p>We like it rough and we like it fast. This 45-minute cycle concept is packed with 10
                                rounds of cycle, weights, and HIIT training.</p>
                            <button>Book a session</button>
                            <button>explore ride</button>
                        </div>
                        <div class="home-sect2-next-part-three">
                            <h1>REBEL</h1>
                            <p>We like it rough and we like it fast. This 45-minute cycle concept is packed with 10
                                rounds of cycle, weights, and HIIT training.</p>

                            <button>Book a session</button>
                            <button>explore ride</button>
                        </div>
                    </div>
>>>>>>> 55d71e9a8021275a942f4158f6a4f38fcd79e4e2
                </div>

            </section>
            <?php
<<<<<<< HEAD
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

=======
        });

    Block::make('Home section-3') // Називаємо новий блок - приклад Slider
    ->add_fields(array(
        Field::make('separator', 'hh_separator', 'Home-section3'), // Називаємо новий блок - приклад Slider Full Width
    ))
        ->set_category('prosvit')
        ->set_render_callback(function ($fields, $attributes, $content) {
            $section_class = array('section', 'section home--section3'); // Задаємо власний клас - приклад Slider Full Width
            if (isset($attributes['className'])) {
                array_push($section_class, $attributes['className']);
            }
            ?>
            <section class="<?php echo implode(" ", $section_class) ?>">
                <div class="home-sect3-content">
                    <div class="home-sect3-top-part">
                        <div class="home-sect3-top-part-content">
                            <h1>LAS VEGAS</h1>
                            <div class="home-sect3-text-and-arrow">
                                <a class="home-top-part-sect3-link" href="#"><h2>BOOK A SESSION</h2></a>
                                <a class="home-top-part-sect3-link-img" href="#"><img
                                        src="/wp-content/themes/redemption/resources/assets/images/home-sect3-arrow.png">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="home-sect3-bottom-part">
                        <h2>OUR CLUBS</h2>
                        <div class="home-sect3-bottom-part-cont">
                            <div class="home-sect3-bottom-part-left-part">
                                <h3>NEVADA</h3>
                                <h2>LAS VEGAS</h2>
                                <p>1059 S Rampart Blvd Las Vegas, NV 89145 702. 724. 9815 </p>
                                <div class="home-sect3-bottom-part-text-and-arrow">
                                    <a class="home-bottom-part-sect3-link" href="#"><h3>VIEW STUDIO</h3></a>
                                    <a class="home-bottom-part-sect3-link" href="#"><img
                                            src="/wp-content/themes/redemption/resources/assets/images/home-sect3-arrow.png">
                                    </a>
                                </div>
                            </div>
                            <div class="home-sect3-bottom-part-right-part">
                                <h3>NEVADA</h3>
                                <h2>HENDERSON</h2>
                                <p>TBD</p>
                                <div class="home-sect3-bottom-part-text-and-arrow">
                                    <a class="home-bottom-part-sect3-link" href="#"><h3>VIEW STUDIO</h3></a>
                                    <a class="home-bottom-part-sect3-link" href="#"><img
                                            src="/wp-content/themes/redemption/resources/assets/images/home-sect3-arrow.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </section>
            <?php
        });
>>>>>>> 55d71e9a8021275a942f4158f6a4f38fcd79e4e2
}


