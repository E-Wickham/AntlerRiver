<?php
/**
 * 
 */

 get_header();

    ?>
    <main> 
        <div class="home-page">
            <?php include('template-parts/partials/landing-grid.php');?>
        </div>
        <!-- SECOND NEWS SECTION -->
            
        </div>
        <div class="separator">
                    <!--replace this with new logo-->
                    <img class="logo" src="https://antlerrivermedia.ca/wp-content/uploads/2024/08/AntlerLogoxcf.png">
        </div>
        <div class="section-2">
            <h3 class="news-category">Latest News</h3>
            <?php include('template-parts/partials/category-list.php');?>
        </div>
        <!--ABOUT -->
        <div class="about">
            <div class="aboutFlex">
                <div class="aboutImg"></div>
                <div class="aboutLogin">
                    <a href="/about-us">
                        <h3>About Us</h3>
                        <div class="loginBtn"> About </div>
                    </a>
                </div>
            </div>
        </div>            
    </main>

    <script>
        // simple vanilla js fix to the nav menu
        const menuList = document.querySelector('.menuList');
        const menuListReg = document.querySelector('.menuList-reg');

        // Function to handle the resize event
        function handleResize() {
            if (window.innerWidth > 768) {
                menuList.style.display = 'none';
                menuListReg.style.display = 'flex';
            } else {
                //menuList.style.display = 'flex';
                menuListReg.style.display = 'none';
            }
        }

        // resize event listener
        //window.addEventListener('resize', handleResize);
        // Adjusting the top story line clamp
        let hl1 = document.querySelectorAll(".entry-content-holder")[0]
        let topStoryHL = hl1.querySelector(".entry-title");
        let hdtxt = (topStoryHL.innerHTML).length
        if(hdtxt > 68 && window.innerWidth > 1000) {
            hl1.style.height = "120px"
            hl1.style.top = "22px"
            topStoryHL.style.webkitLineClamp = 2;
        }
    </script>
    <?php

 get_footer();

