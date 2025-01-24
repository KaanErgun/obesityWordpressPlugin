document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("ose-form");
    const resultDiv = document.getElementById("ose-result");

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const bmi = parseFloat(document.getElementById("bmi").value);
        const age = parseInt(document.getElementById("age").value);
        const healthConditions = document.getElementById("health_conditions").value;

        let eligibility = "";

        // Calculate eligibility based on BMI, age, and health conditions
        if (bmi >= 40 || (bmi >= 35 && healthConditions === 'yes')) {
            eligibility = ose_translations.eligible_message; // Dynamic translation
        } else {
            eligibility = ose_translations.not_eligible_message; // Dynamic translation
        }

        // Display the result
        resultDiv.textContent = eligibility;

        // Google Pixel Event
        if (typeof gtag === "function") {
            gtag('event', 'form_submission', {
                'event_category': 'Obesity Calculator',
                'event_label': eligibility
            });
        }

        // Meta Pixel Event
        if (typeof fbq === "function") {
            fbq('track', 'CompleteRegistration', {
                content_name: 'Obesity Surgery Eligibility',
                bmi: bmi,
                age: age,
                health_conditions: healthConditions,
                status: eligibility
            });
        }
    });
});
