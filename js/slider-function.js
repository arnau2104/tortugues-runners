document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector(".slider");
    let isDown = false;
    let startX;
    let scrollLeft;
    let velocity = 0;
    let raf;

    slider.addEventListener("mousedown", (e) => {
        isDown = true;
        slider.classList.add("active");
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
        document.body.style.userSelect = "none"; // Evita selección de texto

        // Cancela cualquier animación previa
        cancelAnimationFrame(raf);
    });

    slider.addEventListener("mouseleave", () => {
        isDown = false;
        slider.classList.remove("active");
        document.body.style.userSelect = ""; // Restaura selección de texto
    });

    slider.addEventListener("mouseup", () => {
        isDown = false;
        slider.classList.remove("active");
        document.body.style.userSelect = ""; // Restaura selección de texto
        inertiaScroll(); // Activa el efecto de inercia
    });

    slider.addEventListener("mousemove", (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 1; // Ajusta la velocidad del scroll
        slider.scrollLeft = scrollLeft - walk;
        velocity = walk; // Guarda la velocidad para la inercia
    });

    // Efecto de inercia cuando sueltas el arrastre
    function inertiaScroll() {
        if (Math.abs(velocity) > 0.1) {
            slider.scrollLeft -= velocity;
            velocity *= 0.95; // Disminuye la velocidad gradualmente
            raf = requestAnimationFrame(inertiaScroll);
        }
    }

    // Ajustar la escala del div activo
    slider.addEventListener("scroll", () => {
        clearTimeout(slider.snapTimeout);
        slider.snapTimeout = setTimeout(() => {
            let scrollPosition = slider.scrollLeft;
            let closest = Array.from(slider.children).reduce((prev, curr) => {
                return Math.abs(curr.offsetLeft - scrollPosition) < Math.abs(prev.offsetLeft - scrollPosition) ? curr : prev;
            });

            // Remueve la clase "active" de todas las etapas
            document.querySelectorAll(".etapa").forEach(el => el.classList.remove("active"));
            closest.classList.add("active"); // Aplica la clase "active" a la más cercana

            slider.scrollTo({ left: closest.offsetLeft, behavior: "smooth" });
        }, 200);
    });
});
