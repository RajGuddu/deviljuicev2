@extends('_layouts.master')
@section('content')

    {{-- Banner Section --}}
    <div class="vodka-banner panel-space">
        <div class="container-fluid text-center">
            <h1 class="banner-title text-center w-100 mt-5">Frequently Asked Questions</h1>
        </div>
    </div>

    <div class="bg-black container-fluid">
        <div class="devider bg-black mb-md-0 mb-4"></div>
    </div>

    {{-- FAQ Section --}}
    <section class="faq-section bg-black text-white panel-space">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-center mb-4">Your Questions Answered</h2>

                    <div class="accordion" id="faqAccordion">

                        {{-- FAQ 1 --}}
                        <div class="accordion-item text-white border-white">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    What is Devil’s Juice?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-white">
                                    Devil’s Juice is a premium spirits brand focused on bold identity, craftsmanship, and limited-edition releases.
                                </div>
                            </div>
                        </div>

                        {{-- FAQ 2 --}}
                        <div class="accordion-item text-white border-white">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How old do I have to be to purchase?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-white">
                                    You must be 21 years or older.
                                </div>
                            </div>
                        </div>

                        {{-- FAQ 3 --}}
                        <div class="accordion-item text-white border-white">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    How many bottles are available?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-white">
                                    Our initial release is limited to 5,000 bottles.
                                </div>
                            </div>
                        </div>

                        {{-- FAQ 4 --}}
                        <div class="accordion-item text-white border-white">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Does Devil’s Juice ship nationwide?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-white">
                                    Shipping availability depends on state regulations and distribution partners, including Utah DABS.
                                </div>
                            </div>
                        </div>

                        {{-- FAQ 5 --}}
                        <div class="accordion-item text-white border-white">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Is this a pre-order?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-white">
                                    Yes. Early releases are offered as pre-orders where legally permitted.
                                </div>
                            </div>
                        </div>

                        {{-- FAQ 6 --}}
                        <div class="accordion-item text-white border-white">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseFive">
                                    How do I contact support?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-white">
                                    Email support@devilsjuice.com or call (800) 492-9134.
                                </div>
                            </div>
                        </div>

                    </div> {{-- End Accordion --}}

                </div>
            </div>
        </div>
    </section>

@endsection
