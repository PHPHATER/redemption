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


    Block::make( 'Home Section-1' ) // Називаємо новий блок - приклад Slider
    ->add_fields( array(
        Field::make( 'separator', 'hh_separator', 'Home-section1' ), // Називаємо новий блок - приклад Slider Full Width
    ) )
        ->set_category( 'prosvit' )
        ->set_render_callback( function ( $fields, $attributes, $content ) {
            $section_class = array( 'section', 'home--section1' ); // Задаємо власний клас - приклад Slider Full Width
            if( isset($attributes['className']) ) {
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
        } );

    Block::make( 'Home section-2' ) // Називаємо новий блок - приклад Slider
    ->add_fields( array(
        Field::make( 'separator', 'hh_separator', 'Home-section2' ), // Називаємо новий блок - приклад Slider Full Width
    ) )
        ->set_category( 'prosvit' )
        ->set_render_callback( function ( $fields, $attributes, $content ) {
            $section_class = array( 'section', 'section home--section2' ); // Задаємо власний клас - приклад Slider Full Width
            if( isset($attributes['className']) ) {
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
                            <p>We like it rough and we like it fast. This 45-minute cycle concept is packed with 10 rounds of cycle, weights, and HIIT training.</p>
                            <button>Book a session</button>
                            <button>explore ride</button>
                        </div>
                        <div class="home-sect2-next-part-two">
                            <h1>REP</h1>
                            <p>We like it rough and we like it fast. This 45-minute cycle concept is packed with 10 rounds of cycle, weights, and HIIT training.</p>
                            <button>Book a session</button>
                            <button>explore ride</button>
                        </div>
                        <div class="home-sect2-next-part-three">
                            <h1>REBEL</h1>
                            <p>We like it rough and we like it fast. This 45-minute cycle concept is packed with 10 rounds of cycle, weights, and HIIT training.</p>

                            <button>Book a session</button>
                            <button>explore ride</button>
                        </div>
                    </div>
                </div>

            </section>
            <?php
        } );

    Block::make( 'Home section-3' ) // Називаємо новий блок - приклад Slider
    ->add_fields( array(
        Field::make( 'separator', 'hh_separator', 'Home-section3' ), // Називаємо новий блок - приклад Slider Full Width
    ) )
        ->set_category( 'prosvit' )
        ->set_render_callback( function ( $fields, $attributes, $content ) {
            $section_class = array( 'section', 'section home--section3' ); // Задаємо власний клас - приклад Slider Full Width
            if( isset($attributes['className']) ) {
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
                                <a class="home-top-part-sect3-link-img" href="#"><img src="/wp-content/themes/redemption/resources/assets/images/home-sect3-arrow.png"> </a>
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
                                    <a class="home-bottom-part-sect3-link" href="#"><img src="/wp-content/themes/redemption/resources/assets/images/home-sect3-arrow.png"> </a>
                                </div>
                            </div>
                            <div class="home-sect3-bottom-part-right-part">
                                <h3>NEVADA</h3>
                                <h2>HENDERSON</h2>
                                <p>TBD</p>
                                <div class="home-sect3-bottom-part-text-and-arrow">
                                    <a class="home-bottom-part-sect3-link" href="#"><h3>VIEW STUDIO</h3></a>
                                    <a class="home-bottom-part-sect3-link" href="#"><img src="/wp-content/themes/redemption/resources/assets/images/home-sect3-arrow.png"> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <?php
        } );
}


