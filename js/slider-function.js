document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector(".slider");
    const slides = document.querySelectorAll(".etapa");
    const buttons = document.querySelectorAll(".nav-btn");
    const prevBtn = document.getElementById("prev-btn");
    const nextBtn = document.getElementById("next-btn");
    const currentBtn = document.getElementById("current-btn");
    
    let isDown = false;
    let startX;
    let scrollLeft;
    let velocity = 0;
    let raf;

    if(slider) {

        // 🎯 FUNCIONALIDAD: Arrastrar con el ratón (drag)
        slider.addEventListener("mousedown", (e) => {
            isDown = true;
            slider.classList.add("active");
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
            document.body.style.userSelect = "none"; // Evita selección de texto
            cancelAnimationFrame(raf); // Cancela animación previa
        });

        slider.addEventListener("mouseleave", () => {
            isDown = false;
            slider.classList.remove("active");
            document.body.style.userSelect = "";
        });

        slider.addEventListener("mouseup", () => {
            isDown = false;
            slider.classList.remove("active");
            document.body.style.userSelect = "";
            inertiaScroll(); // Activa inercia
        });

        slider.addEventListener("mousemove", (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 1; // Ajusta la velocidad del scroll
            slider.scrollLeft = scrollLeft - walk;
            velocity = walk; // Guarda la velocidad para la inercia
        });

        // 🌊 EFECTO DE INERCIA
        function inertiaScroll() {
            if (Math.abs(velocity) > 0.1) {
                slider.scrollLeft -= velocity;
                velocity *= 0.95; // Disminuye la velocidad gradualmente
                raf = requestAnimationFrame(inertiaScroll);
            }
        }

    
        
        let currentIndex = 0;

        function updateSlider() {
            slider.scrollTo({
                left: slides[currentIndex].offsetLeft,
                behavior: "smooth",
            });
            currentBtn.textContent = currentIndex + 1;
        }

        prevBtn.addEventListener("click", () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        });

        nextBtn.addEventListener("click", () => {
            if (currentIndex < slides.length - 1) {
                currentIndex++;
                updateSlider();
            }
        });

        // Detecta el scroll manual y actualiza los botones
        slider.addEventListener("scroll", () => {
            let closestIndex = 0;
            let minDiff = Math.abs(slider.scrollLeft - slides[0].offsetLeft);

            slides.forEach((slide, i) => {
                let diff = Math.abs(slider.scrollLeft - slide.offsetLeft);
                if (diff < minDiff) {
                    closestIndex = i;
                    minDiff = diff;
                }
            });

            currentIndex = closestIndex;
            currentBtn.textContent = currentIndex + 1;
        });
    }
});
