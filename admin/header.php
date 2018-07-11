



        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                        <a class="nav-link" href="<?php echo BASE_URL; ?>index.php">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="addarticle.php">Add Article</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="view_articles.php">View Articles</a>
                                </li>
                                <div id="actions-all">
                                    <li class="nav-item" style="display:inline-block; float: left;">
                                            <a data-xml="xml" class="nav-link" href="generate_xml_all.php">Generate XML for ALL</a>
                                    </li>
                                    <li class="nav-item" style="display:inline-block; float: left;">
                                            <a data-pdf="pdf" class="nav-link" href="generate_pdf_all.php">Generate PDF for ALL</a>
                                    </li>
                                </div>
                        </ul>
                        <ul class="navbar-nav">
                                <li class="nav-item">
                                        <a class="nav-link" href="logout.php">Log Out</a>
                                </li>
                        </ul>
                </div>
        </nav>
