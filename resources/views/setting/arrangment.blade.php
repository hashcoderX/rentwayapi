<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="row">
        <div class="layoutcontainer col-md-10">
            <div id="topline" style="margin-top: 100px; position: relative;"></div>
            <div class="printinglayout" id="bill">
                <img src="{{ asset($documentFile->agreement_image) }}" alt="" style="width: {{ $documentFile->p_width }}mm;height: {{ $documentFile->p_height }}mm;">

            </div>
        </div>
        <div class="layoutcontainer col-md-2">
            <h3>Make verible</h3>
            <lable>Page No <span id="pagenumber">{{ $documentFile->page_number }}</span></lable>
            <div class="form-group">
                <label for="exampleInputUsername1">Variable name</label>
                <input type="text" class="form-control" id="variablename" name="variablename" style="color: gray;">
                <button class="btn btn-success" id="addvariablebtn" onclick="addVariable()">Add To List</button>
                <button class="btn btn-primary" onclick="printBill()">Print</button>
                <button class="btn btn-primary" onclick="savePositions()">Save Possition</button>
            </div>
            <div class="variablecontainer">

            </div>
        </div>
    </div>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function addVariable() {
        // Get input value
        let variableName = document.getElementById('variablename').value.trim();

        // Check if input is not empty
        if (variableName === "") {
            alert("Please enter a variable name.");
            return;
        }

        // Create a new label element
        let newLabel = document.createElement('label');
        newLabel.textContent = variableName;
        newLabel.id = variableName;
        newLabel.classList.add('variable-label'); // Optional class for styling

        // Set initial position explicitly
        newLabel.style.position = 'absolute';
        newLabel.style.top = '0px';
        newLabel.style.left = '0px';

        // Append to the container
        document.querySelector('.variablecontainer').appendChild(newLabel);

        // Make newly added label draggable
        makeDraggable(newLabel);

        // Clear input field after adding
        document.getElementById('variablename').value = "";
    }


    function makeDraggable(element) {
        const topline = document.getElementById('topline');
        let offsetX = 0;
        let offsetY = 0;
        let isDragging = false;

        // Function to get position relative to 'topline'
        function logRelativePosition() {
            const toplineRect = topline.getBoundingClientRect();
            const elementRect = element.getBoundingClientRect();

            const relativeLeft = elementRect.left - toplineRect.left;
            const relativeTop = elementRect.top - toplineRect.top;
            const relativeRight = toplineRect.right - elementRect.right;
            const relativeBottom = toplineRect.bottom - elementRect.bottom;

            console.log(`Position of ${element.id} relative to 'topline': 
            Left: ${relativeLeft}px, 
            Top: ${relativeTop}px, 
            Right: ${relativeRight}px, 
            Bottom: ${relativeBottom}px`);

            // Store the relative position in data attributes
            element.dataset.relativeLeft = relativeLeft;
            element.dataset.relativeTop = relativeTop;
        }

        // Start dragging
        element.addEventListener('mousedown', (e) => {
            isDragging = true;
            offsetX = e.clientX - element.getBoundingClientRect().left;
            offsetY = e.clientY - element.getBoundingClientRect().top;
            element.style.cursor = 'grabbing';
            e.preventDefault(); // Prevents text selection
        });

        // Drag the element
        document.addEventListener('mousemove', (e) => {
            if (isDragging) {
                element.style.left = `${e.clientX - offsetX}px`;
                element.style.top = `${e.clientY - offsetY}px`;
            }
        });

        // Stop dragging and log position
        document.addEventListener('mouseup', () => {
            if (isDragging) {
                isDragging = false;
                element.style.cursor = 'grab';
                logRelativePosition();
            }
        });
    }

    // Initialize makeDraggable for all existing labels
    document.querySelectorAll('.variablecontainer label').forEach(makeDraggable);



    function savePositions() {
        // Check if jQuery is loaded
        if (typeof $ === 'undefined') {
            console.error("jQuery is not loaded. Please include jQuery.");
            return;
        }

        // Get the topline element's position
        const topline = document.getElementById('topline');
        if (!topline) {
            console.error("Topline element not found.");
            return;
        }

        const toplineRect = topline.getBoundingClientRect();

        // Select the variable container
        const variableContainer = document.querySelector('.variablecontainer');
        if (!variableContainer) {
            console.error("Variable container not found.");
            return;
        }

        // Select all child elements inside the variable container
        const elements = variableContainer.querySelectorAll('*');

        // Get the page number
        let pagenumberElement = document.getElementById('pagenumber');
        let pagenumber = pagenumberElement ? pagenumberElement.innerHTML : null;

        if (!pagenumber) {
            console.warn("Page number not found or empty.");
        }

        // Object to store relative positions
        const positions = {};

        // Iterate through each element
        elements.forEach(element => {
            if (element.id) { // Only process elements with an ID
                const elementRect = element.getBoundingClientRect();
                // Calculate relative top and left positions
                const relativeTop = elementRect.top - toplineRect.top;
                const relativeLeft = elementRect.left - toplineRect.left;

                // Store positions
                positions[element.id] = {
                    top: relativeTop,
                    left: relativeLeft,
                    pagenumber: pagenumber
                };
            }
        });

        // AJAX request to send data to the backend
        $.ajax({
            url: '/saveagreementpossition', // Replace with your actual endpoint
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(positions),
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') // CSRF protection for Laravel
            },
            success: function(response) {
                console.log('Positions saved successfully:', response);
                alert('Positions have been saved successfully!');
            },
            error: function(xhr, status, error) {
                console.error("Error saving positions:", error);
            }
        });
    }
</script>

<script>
    function printBill() {
        let billContent = document.getElementById('bill').innerHTML;
        let printWindow = window.open('', '', 'width=800,height=600');
        printWindow.document.write(`
        <html>
            <head>
                <title>Print Bill</title>
                <style>
                    @media print {
                        body, html { 
                            margin: 0; 
                            padding: 0; 
                            height: auto; 
                            width: 100%;
                        }
                        .printinglayout { 
                            width: 100%; 
                            text-align: center; 
                            margin: 0; 
                            padding: 0;
                        }
                        img { 
                            max-width: 100%; 
                            height: auto; 
                            display: block; 
                            margin: 0 auto; 
                        }
                    }
                </style>
            </head>
            <body onload="window.print(); window.close();">
                ${billContent}
            </body>
        </html>
    `);
        printWindow.document.close();
    }
</script>