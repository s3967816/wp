<?php
$pageTitle = 'Browse Books | BookVerse';

require_once 'includes/db_connect.inc';
include 'includes/header.inc';
include 'includes/nav.inc';
?>


    <main class="container py-5">

        <div class="page-heading mb-4">
            <span class="material-icons">library_books</span>
            <h1>All Books</h1>
        </div>

        <section class="filter-section mb-4">

            <label for="statusFilter">Filter by Status:</label>

            <select id="statusFilter" class="form-select">
                <option value="all">Show All</option>
                <option value="Available">Available</option>
                <option value="Reserved">Reserved</option>
                <option value="Sold">Sold</option>
            </select>

        </section>

        <section class="books-table-container">

            <div class="table-responsive">

                <table class="table books-table">

                    <tbody>

                        <tr data-status="Available">
                            <td>The Midnight Library</td>
                            <td>Matt Haig</td>
                            <td>Fiction</td>
                            <td>2020</td>
                            <td>$24.99</td>
                            <td>
                                <span class="status-badge available">
                                    Available
                                </span>
                            </td>
                        </tr>

                        <tr data-status="Available">
                            <td>Project Hail Mary</td>
                            <td>Andy Weir</td>
                            <td>Science Fiction</td>
                            <td>2021</td>
                            <td>$28.99</td>
                            <td>
                                <span class="status-badge available">
                                    Available
                                </span>
                            </td>
                        </tr>

                        <tr data-status="Available">
                            <td>Dune</td>
                            <td>Frank Herbert</td>
                            <td>Science Fiction</td>
                            <td>1965</td>
                            <td>$22.99</td>
                            <td>
                                <span class="status-badge available">
                                    Available
                                </span>
                            </td>
                        </tr>

                        <tr data-status="Available">
                            <td>The Hobbit</td>
                            <td>J.R.R. Tolkien</td>
                            <td>Fantasy</td>
                            <td>1937</td>
                            <td>$18.99</td>
                            <td>
                                <span class="status-badge available">
                                    Available
                                </span>
                            </td>
                        </tr>

                        <tr data-status="Available">
                            <td>1984</td>
                            <td>George Orwell</td>
                            <td>Dystopian</td>
                            <td>1949</td>
                            <td>$16.99</td>
                            <td>
                                <span class="status-badge available">
                                    Available
                                </span>
                            </td>
                        </tr>

                        <tr data-status="Reserved">
                            <td>Pride and Prejudice</td>
                            <td>Jane Austen</td>
                            <td>Romance</td>
                            <td>1813</td>
                            <td>$14.99</td>
                            <td>
                                <span class="status-badge reserved">
                                    Reserved
                                </span>
                            </td>
                        </tr>

                        <tr data-status="Available">
                            <td>To Kill a Mockingbird</td>
                            <td>Harper Lee</td>
                            <td>Fiction</td>
                            <td>1960</td>
                            <td>$19.99</td>
                            <td>
                                <span class="status-badge available">
                                    Available
                                </span>
                            </td>
                        </tr>

                        <tr data-status="Sold">
                            <td>The Great Gatsby</td>
                            <td>F. Scott Fitzgerald</td>
                            <td>Fiction</td>
                            <td>1925</td>
                            <td>$15.99</td>
                            <td>
                                <span class="status-badge sold">
                                    Sold
                                </span>
                            </td>
                        </tr>

                        <tr data-status="Available">
                            <td>Educated</td>
                            <td>Tara Westover</td>
                            <td>Memoir</td>
                            <td>2018</td>
                            <td>$20.99</td>
                            <td>
                                <span class="status-badge available">
                                    Available
                                </span>
                            </td>
                        </tr>

                        <tr data-status="Reserved">
                            <td>The Seven Husbands</td>
                            <td>Taylor Jenkins Reid</td>
                            <td>Fiction</td>
                            <td>2017</td>
                            <td>$18.99</td>
                            <td>
                                <span class="status-badge reserved">
                                    Reserved
                                </span>
                            </td>
                        </tr>

                        <tr data-status="Available">
                            <td>Atomic Habits</td>
                            <td>James Clear</td>
                            <td>Self-Help</td>
                            <td>2018</td>
                            <td>$26.99</td>
                            <td>
                                <span class="status-badge available">
                                    Available
                                </span>
                            </td>
                        </tr>

                        <tr data-status="Available">
                            <td>Sapiens</td>
                            <td>Yuval Noah Harari</td>
                            <td>Non-Fiction</td>
                            <td>2014</td>
                            <td>$27.99</td>
                            <td>
                                <span class="status-badge available">
                                    Available
                                </span>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </section>

    </main>

   <?php include 'includes/footer.inc'; ?>
