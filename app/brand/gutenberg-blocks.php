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

}


