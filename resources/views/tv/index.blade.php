<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JADWAL POLI - DOKTER</title>
    <style>
        /* General table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Styling for the table header */
        th {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* Styling for the table rows */
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            color: #333;
        }

        /* Zebra striping for rows */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Hover effect for rows */
        tr:hover {
            background-color: #e0f7fa;
        }

        /* Warning row styling */
        tr.warning {
            background-color: #ffc107;
            color: #333;
        }

        tr.warning:hover {
            background-color: #e0a800;
        }

        /* Container for scrolling */
        .table-container {
            max-height: 850px;
            overflow-y: auto;
            margin-bottom: 20px;
        }

        /* Base button styling */
        .btn {
            display: inline-block;
            font-size: 16px;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            border: none;
            font-family: Arial, sans-serif;
            color: white;
        }

        .btn.label-success {
            background-color: #28a745;
        }

        .btn.label-success:hover {
            background-color: #218838;
        }

        .btn.label-danger {
            background-color: #dc3545;
        }

        .btn.label-danger:hover {
            background-color: #c82333;
        }

        /* Styling for countdown timer */
        .countdown {
            font-size: 20px;
            font-weight: bold;
            color: #ff5722;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Countdown display -->

<div class="table-container" id="scroll-container">
    <table class="styled-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Klinik</th>
                <th>Dokter</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example data. In Laravel, this would be generated with a loop -->
            @foreach ($dokters as $row)
            <tr class="{{ $row->ket == '0' ? 'warning' : '' }}">
                <td> {{ $loop->iteration }} </td>
                <td> {{ $row->poly->nama }} </td>
                <td> {{ $row->NAMADOKTER }} </td>
                <td> 
                    @if($row->ket == '1')
                        <button class="btn label-success"> BUKA </button>
                    @else 
                        <button class="btn label-danger"> TUTUP </button>
                    @endif 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    let countdownElement = document.getElementById('countdown');
    let scrollContainer = document.getElementById('scroll-container');
    let countdownTime = 10; // Time in seconds
    let scrollInterval = 10000; // Scroll interval in milliseconds (10 seconds)

    function updateCountdown() {
        countdownElement.textContent = `Next scroll in: ${countdownTime}s`;
        countdownTime--;
        if (countdownTime < 0) {
            countdownTime = scrollInterval / 1000 - 1; // Reset countdown after each scroll
        }
    }

    function autoScroll() {
        // Scroll to bottom
        scrollContainer.scrollTo({
            top: scrollContainer.scrollHeight,
            behavior: 'smooth'
        });

        // Scroll back to top after a delay
        setTimeout(() => {
            scrollContainer.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }, 5000); // Scroll to top after 5 seconds
    }

    // Start countdown timer and auto-scroll
    setInterval(() => {
        autoScroll();
    }, scrollInterval);

    // Update countdown every second
    setInterval(updateCountdown, 1000);
</script>

</body>
</html>
