const form = document.getElementById("register-form");
const step1 = document.getElementById("step-1");
const step2 = document.getElementById("step-2");
const emailInput = document.getElementById("email");
const nameInput = document.getElementById("name");
const displayEmail = document.getElementById("display-email");
const btnNext = document.getElementById("btn-next");
const btnBack = document.getElementById("btn-back");

async function processStep1() {
    if (!emailInput.checkValidity() || emailInput.value.trim() === "") {
        emailInput.reportValidity();
        return false;
    }

    const email = emailInput.value.trim();
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute("content");

    try {
        if (btnNext) {
            btnNext.disabled = true;
        }

        const response = await fetch("/check-email", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify({ email: email }),
        });

       if (response.status === 422) {
            alert('El correo ingresado no es válido.');
            emailInput.focus();
            return; // Bloquea el paso
        }

        // 2. Manejo de cualquier otro error del servidor (500, 419, etc.)
        if (!response.ok) {
            alert('Error en la verificación. Inténtalo de nuevo.');
            return; // Bloquea el paso
        }
        const data = await response.json();

        if (data.exists) {
            alert("Este correo ya esta registrado");
            emailInput.focus();
            return false;
        }

        displayEmail.textContent = email;
        step1.classList.add("hidden");
        step2.classList.remove("hidden");
        nameInput.focus();
        return true;
    } catch (error) {
        console.error("Error al verificar el correo:", error);
    } finally {
        if (btnNext) {
            btnNext.disabled = false;
        }
    }
}

// 1. Click en el botón "Siguiente"
if (btnNext) {
    btnNext.addEventListener("click", processStep1);
}

// 2. Interceptar el Enter / Submit cuando estemos en el Paso 1
if (form) {
    form.addEventListener("submit", (e) => {
        // Si el Paso 1 NO está oculto, el usuario presionó Enter en el correo
        if (!step1.classList.contains("hidden")) {
            e.preventDefault(); // Detiene el envío hacia Laravel
            processStep1(); // Avanza al Paso 2
        }
    });
}

// 3. Volver al Paso 1
if (btnBack) {
    btnBack.addEventListener("click", () => {
        step2.classList.add("hidden");
        step1.classList.remove("hidden");
        emailInput.focus();
    });
}

// Avanzar al Paso 2
// btnNext.addEventListener("click", () => {
//     // Validación nativa del navegador para el correo
//     if (!emailInput.checkValidity() || emailInput.value.trim() === "") {
//         emailInput.reportValidity();
//         return;
//     }

//     // Mostrar el email en la cabecera del paso 2
//     displayEmail.textContent = emailInput.value;

//     // Ocultar paso 1, mostrar paso 2
//     step1.classList.add("hidden");
//     step2.classList.remove("hidden");
//     nameInput.focus();

//     btnBack.addEventListener('click', () => {
//         step2.classList.add('hidden');
//         step1.classList.remove('hidden');
//         emailInput.focus();
//     });

//     // Si Laravel redevuelve la vista con errores de validación (por ejemplo, contraseña muy corta),
//     // se detecta si ya había un correo ingresado con `old('email')` para mantener al usuario en el Paso 2.
//     if (emailInput.value.trim() !== '' ) {
//         displayEmail.textContent = emailInput.value;
//         step1.classList.add('hidden');
//         step2.classList.remove('hidden');
//     }
// });
