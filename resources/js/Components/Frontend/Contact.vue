<script>
export default {
    data() {
        return {
            form: {
                name: "",
                email: "",
                body: "",
                errors: {},
            },
            showMessage: false,
            isSubmitting: false,
        };
    },
    methods: {
        async handleSubmit() {
            const route = this.route("contact"); // Assuming this.route is defined
            await this.submit(route);
        },
        async submit(route) {
            this.isSubmitting = true;
            this.form.errors = {};

            try {
                // Perform form submission logic here (e.g., API call)
                await axios.post(route, this.form);

                // On success:
                this.showMessage = true;
                this.form.name = "";
                this.form.email = "";
                this.form.body = "";
                setTimeout(() => {
                    this.showMessage = false;
                }, 3000);
            } catch (error) {
                // Handle errors and update form.errors if needed
                if (error.response && error.response.data.errors) {
                    this.form.errors = error.response.data.errors;
                }
            } finally {
                this.isSubmitting = false;
            }
        },
    },
};
</script>

<template>
    <section id="contact" class="section bg-light-primary dark:bg-dark-primary">
        <div
            class="container mx-auto"
            v-motion
            :initial="{
                opacity: 0,
                y: 100,
            }"
            :visible="{
                opacity: 1,
                y: 0,
            }"
        >
            <div class="flex flex-col items-center text-center">
                <h2 class="section-title">Contact Me</h2>
                <p class="subtitle">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Fuga veniam labore nisium illum cupiditate reiciendis a
                    numquam
                </p>
            </div>
            <div class="flex flex-col lg:flex-row lg:gap-x-8">
                <div
                    class="flex flex-1 flex-col items-start space-y-8 mb-12 lg:mb-0 lg:pt-2"
                >
                    <div class="flex flex-col lg:flex-row gap-x-4">
                        <div
                            class="text-accent rounded-sm w-14 h-14 flex items-start justify-center mt-2 mb-4 lg:mb-0 text-2xl"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"
                                />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-body text-xl mb-1">
                                Have a question?
                            </h4>
                            <P class="mb-1 text-white"
                                >I am here to help you.</P
                            >
                            <p class="text-accent font-normal">
                                Email me at hasibulislam8381@gmail.com
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row gap-x-4">
                        <div
                            class="text-accent rounded-sm w-14 h-14 flex items-start justify-center mt-2 mb-4 lg:mb-0 text-2xl"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                                />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-body text-xl mb-1">
                                Current Location
                            </h4>
                            <P class="mb-1 text-white">Tirana, Albania.</P>
                            <p class="text-accent font-normal">
                                Serving clients worldwide.
                            </p>
                        </div>
                    </div>
                </div>
                <form
                    @submit.prevent="handleSubmit"
                    class="space-y-8 w-full max-w-md"
                >
                    <div
                        v-if="showMessage"
                        class="m-2 p-4 bg-light-tail-500 dark:bg-dark-navy-100 text-light-secondary rounded-lg"
                    >
                        Thank you for contacting me.
                    </div>
                    <div class="flex gap-8">
                        <div>
                            <input
                                v-model="form.name"
                                type="text"
                                class="input"
                                placeholder="Your Name"
                            />
                            <span
                                v-if="form.errors.name"
                                class="text-sm m-2 text-red-400"
                                >{{ form.errors.name }}</span
                            >
                        </div>
                        <div>
                            <input
                                v-model="form.email"
                                type="email"
                                class="input"
                                placeholder="Your Email"
                            />
                            <span
                                v-if="form.errors.email"
                                class="text-sm m-2 text-red-400"
                                >{{ form.errors.email }}</span
                            >
                        </div>
                    </div>
                    <textarea
                        v-model="form.body"
                        class="textarea"
                        placeholder="Your Message"
                        spellcheck="false"
                    ></textarea>
                    <span
                        v-if="form.errors.body"
                        class="text-sm m-2 text-red-400"
                        >{{ form.errors.body }}</span
                    >

                    <button
                        class="btn btn-lg bg-accent hover:bg-secondary text-white"
                        :disabled="isSubmitting"
                    >
                        Send message
                    </button>
                </form>
                <div v-if="isSubmitting" class="loader-container">
                    <div class="loader"></div>
                </div>
            </div>
        </div>
    </section>
</template>
<style scoped>
.loader-container {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    /* background: rgba(255, 255, 255, 0.8);  */
    z-index: 999; /* Ensure it's above other content */
}

.loader {
    width: 40px;
    height: 40px;
    color: #ffffff;
    background: conic-gradient(
            from -45deg at top 20px left 50%,
            #0000,
            currentColor 1deg 90deg,
            #f0f0f000 91deg
        ),
        conic-gradient(
            from 45deg at right 20px top 50%,
            #0000,
            currentColor 1deg 90deg,
            #0000 91deg
        ),
        conic-gradient(
            from 135deg at bottom 20px left 50%,
            #0000,
            currentColor 1deg 90deg,
            #0000 91deg
        ),
        conic-gradient(
            from -135deg at left 20px top 50%,
            #0000,
            currentColor 1deg 90deg,
            #0000 91deg
        );
    animation: l4 1.5s infinite cubic-bezier(0.3, 1, 0, 1);
}

@keyframes l4 {
    50% {
        width: 60px;
        height: 60px;
        transform: rotate(180deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>
