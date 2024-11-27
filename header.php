<?php
/**
 * Contains the header.
 */

 $bloginfo = get_bloginfo();
 $blogdesc = get_bloginfo('description');
 $categories = get_categories();
?>
<!doctype html>
<html <?php language_attributes();?>>
    <head>
        <meta charset="<?php bloginfo( 'charset') ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $bloginfo ?></title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap" rel="stylesheet">        
        <?php wp_head(); ?>
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/resize@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    </head>
    <body <?php body_class();?> x-data>
    <nav>
        <div class="navFlex" >
            <a href="https://antlerrivermedia.ca/">
                <div class="title">
                    <!--replace this with new logo-->
                    <img class="logo" src="https://antlerrivermedia.ca/wp-content/uploads/2024/08/AntlerLogoxcf.png">
                    <h1><?php echo $bloginfo ?></h1>
                </div>
            </a>

            <div x-data="{ open: false, resp:false }" class="links" x-resize.document="resp = $width < 751, open = resp && open" >
                <button x-show="resp" @click="open = !open" class="menu-button">
                    <i x-show="open" class='bx bxs-x-square'></i>
                    <i x-show="!open" class='bx bx-menu'></i>
                </button>
                <div x-show="open" :class="!open ? 'shrink-menu' : 'grow-menu'">
                    <?php 
                    $defaults = array(
                        'theme_location' => 'top', 
                        'container' => 'div', 
                        'menu_class' => 'menuList', 
                        'menu' => 'Main Menu'
                        );
                        wp_nav_menu($defaults); 
                    ?>
                </div>
                <div x-show="!open" class="menuList-reg">
                    <?php 
                    $defaults2 = array(
                    'theme_location' => 'top', 
                    'container' => 'div', 
                    'menu_class' => 'menuList-reg', 
                    'menu' => 'Main Menu'
                    );
                    wp_nav_menu($defaults2);
                    ?> 

                </div>
            </div>
        </div>  
        <div class="sub-header">
            <?php 
                foreach ( $categories as $category ) 
                { ?>
                    <div class="sub-heading">
                        <a href="<?php echo get_category_link($category->term_id ); ?> "><?php echo $category->name;  ?> </a></li> 
                    </div>
                    <?php 
                }
            ?>
        </div>              
    </nav>


    <style>



        .menuList {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        .menuList a, .menuList div {
            min-height: 20px;
            min-width: 200px;
            display: block;
            color: black;
            padding: 0.25rem;
        }
        li.page_item {
            white-space: nowrap;
        }
        li.page_item:hover {
            backdrop-filter: brightness(0.9);
        }
        .menutransition {
            animation: showMenu 0.5s;
        }

        @keyframes showMenu {
            from {opacity: 0;}
            to {opacity: 1;}
        }


        .menu-links {
            display: flex;
            flex-direction: column;
            display: none;
        }

        .menu-links a {
            border-top: 1px solid #444;
        }

        @media (min-width: 600px) {
            .menu-links {
                display: flex;
                flex-direction: row;
                align-items: center;
            }

            .menu-links a {
                border-top: none;
            }


        }


        .menuList.show {
            visibility:visible;
        }
    </style>
