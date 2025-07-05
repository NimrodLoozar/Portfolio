document.addEventListener('DOMContentLoaded', function() {
    const typewriter = document.getElementById('typewriter');
    const cursor = document.getElementById('cursor');

    if (!typewriter || !cursor) return;

    const texts = [
        'JR. Full-Stack Developer',
        'JR. Frontend Developer',
        'JR. Backend Developer',
        'JR. Web Application Developer',
        'Student Developer',
        'JR. Website Developer'
    ];

    let textIndex = 0;
    let charIndex = 0;
    let isDeleting = false;

    function type() {
        const currentText = texts[textIndex];

        if (isDeleting) {
            typewriter.textContent = currentText.substring(0, charIndex - 1);
            charIndex--;
        } else {
            typewriter.textContent = currentText.substring(0, charIndex + 1);
            charIndex++;
        }

        let typeSpeed = isDeleting ? 100 : 150;

        if (!isDeleting && charIndex === currentText.length) {
            typeSpeed = 2000; // Pause at end
            isDeleting = true;
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            textIndex = (textIndex + 1) % texts.length;
            typeSpeed = 500; // Pause before next word
        }

        setTimeout(type, typeSpeed);
    }

    // Start the animation
    type();
});
