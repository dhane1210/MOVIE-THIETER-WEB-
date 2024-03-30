<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            display: grid;
            grid-template-columns: repeat(13, 50px);
            grid-gap: 10px;
            margin-right: 0;
            margin-top: -25%;
            width: auto;
        }

        .seat {
            width: 50px;
            height: 40px;
            background-color: #ccc;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            box-shadow: 0px 0px 20px 0px rgba(128, 36, 36, 0.991);
            transition: background-color 0.3s, box-shadow 0.3s; /* Add transition effect */
        }

        .seat:hover {
            background-color: tomato; /* Change color on hover */
            box-shadow: 0px 0px 30px 10px rgba(128, 36, 36, 0.991); /* Change shadow on hover */
        }

        .seat.selected {
            background-color: tomato;
        }
    </style>
    <script>
        const container = document.getElementById('container1');
        const selectedSeat = document.getElementById('selected-seat');
        const selectedSeatsInput = document.getElementById('selected-seats-input');
        let selectedSeats = [];

        // Function to create seats
        function createSeats() {
            const rows = 4;
            const seatsPerRow = 13; // Adjust as needed
            const totalSeats = rows * seatsPerRow;

            for (let i = 1; i <= totalSeats; i++) {
                const seat = document.createElement('div');
                seat.classList.add('seat');
                seat.setAttribute('data-seat', i);
                seat.textContent = i; // Display seat number
                seat.addEventListener('click', () => toggleSeat(seat));
                container.appendChild(seat);
            }
        }

        // Function to toggle seat selection
        function toggleSeat(seat) {
            const seatNumber = parseInt(seat.getAttribute('data-seat'));
            if (selectedSeats.includes(seatNumber)) {
                selectedSeats = selectedSeats.filter(num => num !== seatNumber);
                seat.classList.remove('selected');
            } else {
                selectedSeats.push(seatNumber);
                seat.classList.add('selected');
            }
            selectedSeatsInput.value = selectedSeats.join(',');
        }

        // Initialize
        createSeats();
    </script>
</head>

<body>
    <div class="container" id="container1"></div>
    <input type="hidden" name="selected_seats[]" id="selected-seats-input">
</body>

</html>
