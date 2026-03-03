@extends('layout')

@section('content')
<div class="container my-5">

    <!-- PAGE HEADER -->
    <div class="mb-5">
        <h2 class="fw-bold text-danger">
            ❓ Common Concerns About Blood Donation
        </h2>
        <p class="text-muted mt-2">
            It’s natural to have questions before donating blood.
            Click on a concern below to view clear, medically verified answers.
        </p>
    </div>

    <!-- FAQ CARDS -->
    <div class="row g-4">

        <!-- FAQ ITEM -->
        <div class="col-12">
            <div class="faq-card" onclick="toggleFaq(this)">
                <div class="faq-question">
                    🛡️ Is blood donation safe?
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    Blood donation is a safe medical procedure when performed at
                    licensed hospitals or blood banks. All equipment used is
                    sterile, disposable, and single-use, eliminating any risk of infection.
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="faq-card" onclick="toggleFaq(this)">
                <div class="faq-question">
                    💉 Does donating blood hurt?
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    Most donors feel only a brief pinprick when the needle is inserted.
                    Any discomfort is mild and temporary, and trained professionals
                    ensure a comfortable experience.
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="faq-card" onclick="toggleFaq(this)">
                <div class="faq-question">
                    😌 Will I feel weak or dizzy after donating?
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    Some donors may feel slightly tired for a short time.
                    Resting for 10–15 minutes, drinking fluids, and avoiding
                    heavy exercise helps you recover quickly.
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="faq-card" onclick="toggleFaq(this)">
                <div class="faq-question">
                    🩸 Is too much blood taken?
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    No. Only 350–450 ml of blood is collected, which is safe
                    for healthy adults. Your body replaces lost fluids within
                    24 hours and red blood cells within a few weeks.
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="faq-card" onclick="toggleFaq(this)">
                <div class="faq-question">
                    🎨 Can I donate if I have tattoos or piercings?
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    Yes, after a waiting period of at least 6 months,
                    provided the tattoo or piercing was done at a licensed facility.
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="faq-card" onclick="toggleFaq(this)">
                <div class="faq-question">
                    🦠 Can I get diseases by donating blood?
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    No. It is impossible to contract diseases such as HIV or Hepatitis
                    through blood donation. All equipment used is sterile and disposable.
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="faq-card" onclick="toggleFaq(this)">
                <div class="faq-question">
                    ⏱️ How long does the donation process take?
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    The full process usually takes 30–45 minutes, including screening
                    and rest. The actual blood collection takes about 10 minutes.
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="faq-card" onclick="toggleFaq(this)">
                <div class="faq-question">
                    🔁 How often can I donate blood?
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    Whole blood can be donated every 3 months.
                    Platelets every 2 weeks (with medical advice),
                    and plasma as recommended by the donation center.
                </div>
            </div>
        </div>

    </div>

    <!-- MOTIVATION -->
    <div class="alert alert-success shadow-sm mt-5">
        ❤️ <strong>One donation can save up to three lives.</strong><br>
        Your contribution makes a real difference.
    </div>

    <!-- CTA -->
    <div class="text-center mt-4">
        <a href="{{ route('donations.manage') }}" class="btn btn-danger px-4 me-2">
            Book a Donation Slot
        </a>
        <br><br>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-danger px-4">
            Back to Dashboard
        </a>
    </div>

</div>

<!-- STYLES -->
<style>
.faq-card {
    background: #fff;
    border-radius: 14px;
    padding: 18px 22px;
    border: 1px solid #eee;
    cursor: pointer;
    transition: box-shadow 0.3s ease;
}

.faq-card:hover {
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
}

.faq-question {
    font-weight: 600;
    color: #b11226;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: all 0.4s ease;
    color: #555;
    margin-top: 12px;
    line-height: 1.6;
}

.faq-card.active .faq-answer {
    max-height: 300px;
}

.faq-icon {
    font-size: 22px;
    transition: transform 0.3s ease;
}

.faq-card.active .faq-icon {
    transform: rotate(45deg);
}
</style>

<!-- SCRIPT -->
<script>
function toggleFaq(card) {
    document.querySelectorAll('.faq-card').forEach(item => {
        if (item !== card) item.classList.remove('active');
    });
    card.classList.toggle('active');
}
</script>
@endsection
