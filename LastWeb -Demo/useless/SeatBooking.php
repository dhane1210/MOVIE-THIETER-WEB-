<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie Theater Seat Selection</title>
  <style>
    .container {
      display: grid;
      grid-template-columns: repeat(8, 50px); /* Adjust column count as needed */
      grid-gap: 5px;
      justify-content: center;
    }

    .seat {
      width: 50px;
      height: 50px;
      background-color: #ccc;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .seat.selected {
      background-color: #ff0000;
    }
  </style>
</head>
<body>
  <h2>Movie Theater Seat Selection</h2>
  <div class="container" id="container"></div>
  <p>Selected Seat: <span id="selected-seat"></span></p>
  
  <script>
    const container = document.getElementById('container');
    const selectedSeat = document.getElementById('selected-seat');
    let selectedSeats = [];

    // Function to create seats
    function createSeats() {
      const rows = 4;
      const seatsPerRow = 8; // Adjust as needed
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
      selectedSeat.textContent = selectedSeats.join(', ');
    }

    // Initialize
    createSeats();
  </script>
</body>
</html>