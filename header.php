<?php
/**
 * Contains the header.
 */

 $bloginfo = get_bloginfo();
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
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    </head>
    <body <?php body_class();?> x-data>
    <nav>
        <div class="navFlex" >
            <div class="utils"></div>

            <a href="/">
                <div class="title">
                    <!--replace this with new logo-->
                    <div class="separator">
                        <i class='bx bx-water'></i>
                    </div>                        
                    <h1><?php echo $bloginfo ?></h1>
                </div>
            </a>

            <div x-data="{ open: false }" class="links">
                <button @click="open = !open" class="menu-button">
                    <i x-show="open" class='bx bxs-x-square' x-transition></i>
                    <i x-show="!open" class='bx bx-menu' x-transition></i>
                </button>
                <div x-show="open" class="menuList" x-transition>
                    <a href="#"><div class="link">Members</div></a>
                    <a href="#"><div class="link"><i class='bx bxl-facebook-circle'></i></div></a>
                    <a href="#"><div class="link"><i class='bx bxl-instagram' ></i></div></a>

                </div>
                <div x-show="!open" class="menuList-reg" x-transition>
                    <a href="#"><div class="link-reg">Members</div></a>
                    <a href="#"><div class="link-reg"><i class='bx bxl-facebook-circle'></i></div></a>
                    <a href="#"><div class="link-reg"><i class='bx bxl-instagram' ></i></div></a>

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

        .menu-button{
            float:right;
        }
        .menuList-reg {
            display: flex;
            gap: 1rem;
        }
        .menuList {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        .menuList a, .menuList div {
            min-height: 20px;
            min-width: 200px;
            width: 200px;
            display: block;
            color: black;
            padding: 0.25rem;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
