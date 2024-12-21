<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Search UI</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #0b0c10;
        color: #c5c6c7;
        overflow: hidden;
    }

    .container {
        position: relative;
        height: 100vh;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .particle-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }

    .search-ui {
        z-index: 1;
    }

    .search-ui h1 {
        color: #66fcf1;
        font-size: 2.5rem;
        margin: 0 0 10px;
    }

    .search-ui p {
        margin: 0 0 20px;
        font-size: 1rem;
        color: #c5c6c7;
    }

    .search-bar {
        display: flex;
        gap: 10px;
    }

    .search-bar input {
        padding: 10px;
        border: 1px solid #45a29e;
        border-radius: 5px;
        width: 300px;
        background: #1f2833;
        color: #c5c6c7;
    }

    .search-bar button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        background: #45a29e;
        color: #1f2833;
        transition: 0.3s;
    }

    .search-bar button:hover {
        background: #66fcf1;
        color: #0b0c10;
    }
</style>

<body>
    <div class="container">
        <div class="particle-background">
            <canvas id="particles"></canvas>
        </div>
        <div class="search-ui">
            <h1>Revolutionizing Software Security</h1>
            <p>Search for software innovations and technologies</p>
            <div class="search-bar">
                <input type="text" id="search" placeholder="Enter search term...">
                <button id="search-btn">Search</button>
                <button id="clear-btn">Clear</button>
            </div>
        </div>
    </div>
    <script>
        const canvas = document.getElementById('particles');
        const ctx = canvas.getContext('2d');

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        let particlesArray = [];
        const numberOfParticles = 100;

        class Particle {
            constructor(x, y, size, speedX, speedY) {
                this.x = x;
                this.y = y;
                this.size = size;
                this.speedX = speedX;
                this.speedY = speedY;
            }

            draw() {
                ctx.fillStyle = '#66fcf1';
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.closePath();
                ctx.fill();
            }

            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                if (this.x > canvas.width || this.x < 0) this.speedX *= -1;
                if (this.y > canvas.height || this.y < 0) this.speedY *= -1;
            }
        }

        function initParticles() {
            particlesArray = [];
            for (let i = 0; i < numberOfParticles; i++) {
                const size = Math.random() * 3 + 1;
                const x = Math.random() * canvas.width;
                const y = Math.random() * canvas.height;
                const speedX = (Math.random() - 0.5) * 2;
                const speedY = (Math.random() - 0.5) * 2;
                particlesArray.push(new Particle(x, y, size, speedX, speedY));
            }
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particlesArray.forEach(particle => {
                particle.update();
                particle.draw();
            });
            requestAnimationFrame(animate);
        }

        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            initParticles();
        });

        initParticles();
        animate();

    </script>
</body>

</html>