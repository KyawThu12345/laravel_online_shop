<style>
    .HC {
        color: #575b5e;
    }
</style>
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="/" rel="nofollow">Home</a>
            <span></span> Contact us
        </div>
    </div>
</div>
<section class="pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="m-auto col-xl-8 col-lg-10">
                <div class="contact-from-area padding-20-row-col wow FadeInUp animated" style="visibility: visible;">
                    <h1 class="mb-10 text-center">CONTACT US</h1>
                    <div class="container p-2 mb-20 bg-light mt-30">
                        <h2 class="m-2 HC">Get in touch</h3>
                            <p class="text-center text-muted font-sm">Want to get in touch? We'd love to hear from you.
                                Here's how
                                <br>you can reach us....
                            </p>
                    </div>
                    <form class="text-center contact-form-style" id="contact-form" method="post"
                        wire:submit.prevent="contact_mail_send" action="{{ route('contact_mail') }}">
                        @csrf
                        <div class="row">
                            @if (session()->has('message'))
                            <div class="alert alert-success col-lg-12">
                                {{ session('message') }}
                            </div>
                            @endif
                            <div class="col-lg-6 col-md-6">
                                <div class="mb-20 input-style">
                                    <input wire:model='name' name="name" placeholder="Name" type="text">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="mb-20 input-style">
                                    <input wire:model='email' name="email" placeholder="Your Email" type="email">
                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="mb-20 input-style">
                                    <input wire:model='subject' name="subject" placeholder="Subject" type="text">
                                    @error('subject') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="textarea-style mb-30">
                                    <textarea wire:model='message' name="message" placeholder="Message"
                                        style="height: 217px;"></textarea>
                                    @error('message') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <button class="submit submit-auto-width" type="submit">Send
                                    message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
