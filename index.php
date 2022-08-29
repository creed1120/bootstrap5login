<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Applications</title>

    <link rel="stylesheet" href="dist/css/app.css">
    <script src="dist/js/app.js"></script>

    <style>
        .carousel {
            height: 500px;
        }
        .carousel img {
            object-fit: cover;
        }
        
    </style>

</head>
<body id="wrapper">


    <!-- Button HTML (to Trigger Modal) -->
    <a id="myBtn" href="#modalCenter" role="button" class="btn btn-primary">Vertically Centered Modal</a>

    <!-- Modal HTML -->
    <div id="modalCenter" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Vertical Alignment Demo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, consectetur elit...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">OK, Got it!</button>
                </div>
            </div>
        </div>
    </div>


    <div class="bs-example">


        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="./assets/images/sam-dosan-ORPlZogKwd4-unsplash.jpg" class="d-block w-100 h-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="./assets/images/wasa-crispbread-f4kKHjf1Ke8-unsplash.jpg" class="d-block w-100 h-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>




        <p>
            <button id="myPopover" type="button" class="btn btn-primary" data-bs-toggle="popover" title="Custom Popover Template" data-bs-content="This is an example of a custom Bootstrap popover.">Popover</button>
            <button id="myPopover2" type="button" class="btn btn-secondary ms-2" data-bs-toggle="popover" title="Custom Popover Template" data-bs-content="This is another example of a custom Bootstrap popover.">Another Popover</button>
        </p>
        <p><strong>Note:</strong> This is a simple example of customized Bootstrap popover that displays a footer with close button without adding any extra markup to the popover HTML.</p>
        <p>Click on the buttons to show/hide the popover.</p>
    </div>
    
</body>

</html>