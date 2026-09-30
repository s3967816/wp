<?php
$pageTitle = 'Home | BookVerse';

require_once 'includes/db_connect.inc';
include 'includes/header.inc';
include 'includes/nav.inc';
?>

<main>

    <section class="home-carousel">
        <div id="bookCarousel" class="carousel slide" data-bs-ride="carousel">

            
            <!-- Carousel slides -->
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="assets/images/covers/1.png"
                         class="d-block w-100"
                         alt="Book cover">
                    <div class="carousel-caption">
                        <h2>The Midnight Library</h2>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="assets/images/covers/2.png"
                         class="d-block w-100"
                         alt="Book cover">
                    <div class="carousel-caption">
                        <h2>Project Hail Mary</h2>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="assets/images/covers/3.png"
                         class="d-block w-100"
                         alt="Book cover">
                    <div class="carousel-caption">
                        <h2>Dune</h2>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="assets/images/covers/4.png"
                         class="d-block w-100"
                         alt="Book cover">
                    <div class="carousel-caption">
                        <h2>The Hobbit</h2>
                    </div>
                </div>

            </div>

            <!-- Previous button -->
            <button class="carousel-control-prev"
                    type="button"
                    data-bs-target="#bookCarousel"
                    data-bs-slide="prev">

                <span class="carousel-control-prev-icon"
                      aria-hidden="true"></span>

                <span class="visually-hidden">Previous</span>
            </button>

            <!-- Next button -->
            <button class="carousel-control-next"
                    type="button"
                    data-bs-target="#bookCarousel"
                    data-bs-slide="next">

                <span class="carousel-control-next-icon"
                      aria-hidden="true"></span>

                <span class="visually-hidden">Next</span>
            </button>

        </div>
        </section>

    <!-- Featured Books -->
<section class="featured-books">

    <div class="featured-heading">
        <span class="material-icons">favorite</span>
        <h2>Featured Books</h2>
    </div>

    <div class="row g-3">

        <!-- Book 1 -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="home-book-card">

                <img
                    src="assets/images/covers/1.png"
                    alt="The Midnight Library"
                >

                <div class="home-book-info">
                    <h3>The Midnight Library</h3>
                    <p>Fiction · Matt Haig</p>
                    <strong>$24.99</strong>

                    <span class="home-status available">
                        Available
                    </span>
                </div>

            </div>
        </div>


        <!-- Book 2 -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="home-book-card">

                <img
                    src="assets/images/covers/2.png"
                    alt="Project Hail Mary"
                >

                <div class="home-book-info">
                    <h3>Project Hail Mary</h3>
                    <p>Science Fiction · Andy Weir</p>
                    <strong>$28.99</strong>

                    <span class="home-status available">
                        Available
                    </span>
                </div>

            </div>
        </div>


        <!-- Book 3 -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="home-book-card">

                <img
                    src="assets/images/covers/3.png"
                    alt="Dune"
                >

                <div class="home-book-info">
                    <h3>Dune</h3>
                    <p>Science Fiction · Frank Herbert</p>
                    <strong>$22.99</strong>

                    <span class="home-status available">
                        Available
                    </span>
                </div>

            </div>
        </div>


        <!-- Book 4 -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="home-book-card">

                <img
                    src="assets/images/covers/4.png"
                    alt="The Hobbit"
                >

                <div class="home-book-info">
                    <h3>The Hobbit</h3>
                    <p>Fantasy · J.R.R. Tolkien</p>
                    <strong>$18.99</strong>

                    <span class="home-status available">
                        Available
                    </span>
                </div>

            </div>
        </div>


        <!-- Book 5 -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="home-book-card">

                <img
                    src="assets/images/covers/5.png"
                    alt="1984"
                >

                <div class="home-book-info">
                    <h3>1984</h3>
                    <p>Dystopian · George Orwell</p>
                    <strong>$16.99</strong>

                    <span class="home-status available">
                        Available
                    </span>
                </div>

            </div>
        </div>


        <!-- Book 6 -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="home-book-card">

                <img
                    src="assets/images/covers/6.png"
                    alt="Pride and Prejudice"
                >

                <div class="home-book-info">
                    <h3>Pride and Prejudice</h3>
                    <p>Romance · Jane Austen</p>
                    <strong>$14.99</strong>

                    <span class="home-status reserved">
                        Reserved
                    </span>
                </div>

            </div>
        </div>


        <!-- Book 7 -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="home-book-card">

                <img
                    src="assets/images/covers/7.png"
                    alt="To Kill a Mockingbird"
                >

                <div class="home-book-info">
                    <h3>To Kill a Mockingbird</h3>
                    <p>Fiction · Harper Lee</p>
                    <strong>$19.99</strong>

                    <span class="home-status available">
                        Available
                    </span>
                </div>

            </div>
        </div>


        <!-- Book 8 -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="home-book-card">

                <img
                    src="assets/images/covers/8.png"
                    alt="The Great Gatsby"
                >

                <div class="home-book-info">
                    <h3>The Great Gatsby</h3>
                    <p>Fiction · F. Scott Fitzgerald</p>
                    <strong>$15.99</strong>

                    <span class="home-status sold">
                        Sold
                    </span>
                </div>

            </div>
        </div>

    </div>

</section>

</main>

 <?php include 'includes/footer.inc';?>
