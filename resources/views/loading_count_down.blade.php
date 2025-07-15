@php 
    $logo = App\Models\Logo::first(); // Changed from $icons = ... to $logo = ...
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Next Launch</title>

    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">

     <!-- CSS Scripts -->
  <style>
    
:root {
    --primary: #00d9ff;
    --secondary: #00a3cc;
    --dark: #0a0f1e;
    --light: #e0f7ff;
    --accent: #fffdff;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Orbitron', sans-serif;
}

body {
    background-color: var(--dark);
    color: var(--light);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 2rem;
    background-image: radial-gradient(circle, rgba(0, 217, 255, 0.2) 10%, transparent 30%),
                      radial-gradient(circle, rgba(8, 94, 155, 0.2) 70%, transparent 90%);
}

.container {
    max-width: 800px;
    text-align: center;
}

.logo {
    width: 120px;
    margin-bottom: 20px;
}

h1 {
    font-size: 3rem;
    margin-bottom: 1.5rem;
    text-transform: uppercase;
    background: linear-gradient(90deg, var(--primary), var(--accent));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    font-weight: 900;
}

.countdown {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-bottom: 3rem;
}

.countdown-item {
    background: rgba(0, 217, 255, 0.15);
    border-radius: 12px;
    padding: 2rem 1.5rem;
    min-width: 140px;
    text-shadow: 0 0 10px var(--primary);
    border: 2px solid var(--primary);
    backdrop-filter: blur(10px);
}

.countdown-value {
    font-size: 4rem;
    font-weight: bold;
    color: var(--accent);
}

.countdown-label {
    font-size: 1rem;
    text-transform: uppercase;
    opacity: 0.8;
}

.notify-btn {
    background: linear-gradient(90deg, var(--primary), var(--secondary));
    color: white;
    border: none;
    padding: 1rem 2rem;
    font-size: 1.2rem;
    border-radius: 12px;
    cursor: pointer;
    font-weight: bold;
    text-transform: uppercase;
    transition: all 0.3s ease;
    box-shadow: 0 0 15px var(--primary);
}

.notify-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 0 20px var(--accent);
}

@media (max-width: 600px) {
    h1 {
        font-size: 2rem;
    }
    .countdown {
        gap: 1rem;
    }
    .countdown-item {
        min-width: 100px;
        padding: 1.5rem 1rem;
    }
    .countdown-value {
        font-size: 3rem;
    }
}

@media (max-width: 600px) {
    h1 {
        font-size: 2rem;
    }
    .countdown {
        flex-direction: column;
        gap: 1rem;
    }
    .countdown-item {
        min-width: 100px;
        padding: 1.5rem 1rem;
    }
    .countdown-value {
        font-size: 3rem;
    }
    .notify-btn {
        width: 100%;
        padding: 1rem;
    }
}
  </style>
</head>
<body>
    <div class="container">
        
         <img src="{{ asset('/public/uploads/pics/' . $logo->picture2) }}" alt="logo" class="logo">
        <h1>Next Launch</h1>
        
        <div class="countdown">
            <div class="countdown-item"><div class="countdown-value" id="days">00</div><div class="countdown-label">Days</div></div>
            <div class="countdown-item"><div class="countdown-value" id="hours">00</div><div class="countdown-label">Hours</div></div>
            <div class="countdown-item"><div class="countdown-value" id="minutes">00</div><div class="countdown-label">Minutes</div></div>
            <div class="countdown-item"><div class="countdown-value" id="seconds">00</div><div class="countdown-label">Seconds</div></div>
        </div>
        
        <button class="notify-btn" id="notify-btn">Notify Me</button>
    </div>

    <script>
        const launchDate = new Date("july 20, 2025 00:00:00").getTime();
        
        setInterval(() => {
            const now = new Date().getTime();
            const distance = launchDate - now;
            
            if (distance < 0) {
                document.querySelector("h1").textContent = "We Have Launched!";
                return;
            }
            
            document.getElementById("days").textContent = String(Math.floor(distance / (1000 * 60 * 60 * 24))).padStart(2, '0');
            document.getElementById("hours").textContent = String(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
            document.getElementById("minutes").textContent = String(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
            document.getElementById("seconds").textContent = String(Math.floor((distance % (1000 * 60)) / 1000)).padStart(2, '0');
        }, 1000);

        document.getElementById('notify-btn').addEventListener('click', () => {
            alert("You'll be notified when we launch  works!");
        });
    </script>
</body>
</html>
