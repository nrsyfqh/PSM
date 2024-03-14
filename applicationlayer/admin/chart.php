<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Patient Chart</title>
    <!-- Include C3.js and D3.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.css">
    <script src="https://d3js.org/d3.v5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js"></script>
</head>
<body>

<div id="chart-monthly"></div>

<script>
// Fetch data from the server using AJAX
async function fetchData() {
    const response = await fetch('../../datalayer/data.php');
    const data = await response.json();
    
    // Generate the chart
    var chart = c3.generate({
        bindto: '#chart-monthly',
        data: {
            json: data,
            keys: {
                x: 'dat', // x-axis data comes from the 'dat' field
                value: ['patients'] // y-axis data comes from the 'patients' field
            },
            type: 'bar',
        },
        axis: {
            x: {
                type: 'category',
                tick: {
                    format: '%Y-%m'
                }
            }
        },
		bar: {
 			width: 30
 		},
        legend: {
            show: false
        },
		padding: {
 			bottom: 0,
 			top: 0
 		},
    });
}

// Call the fetchData function
fetchData();
</script>

</body>
</html>
