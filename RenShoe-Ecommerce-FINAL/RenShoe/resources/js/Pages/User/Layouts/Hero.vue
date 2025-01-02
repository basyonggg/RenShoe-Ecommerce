<template>
  <!--CATEGORY SECTION-->
  <section class="py-10 bg-white">
    <h2 class="text-center text-2xl font-bold mb-6">CATEGORIES</h2>
    <div class="flex justify-center space-x-16">
      <button class="flex flex-col items-center">
        <img src="Categories/Chuck 70.png" alt="Converse" class="w-20 h-20 rounded-full border border-gray-300">
        <span class="mt-2 text-sm font-medium">Converse</span>
      </button>
      <button class="flex flex-col items-center">
        <img src="Categories/Air Jordan High.png" alt="Nike" class="w-20 h-20 rounded-full border border-gray-300">
        <span class="mt-2 text-sm font-medium">Nike</span>
      </button>
      <button class="flex flex-col items-center">
        <img src="Categories/Kingsley Derby Shoes.png" alt="Aldo" class="w-20 h-20 rounded-full border border-gray-300">
        <span class="mt-2 text-sm font-medium">Aldo</span>
      </button>
      <button class="flex flex-col items-center">
        <img src="Categories/Turino II Sneakers.png" alt="Puma" class="w-20 h-20 rounded-full border border-gray-300">
        <span class="mt-2 text-sm font-medium">Puma</span>
      </button>
      <button class="flex flex-col items-center">
        <img src="Categories/adidas-Samba-OG.png" alt="Adidas" class="w-20 h-20 rounded-full border border-gray-300">
        <span class="mt-2 text-sm font-medium">Adidas</span>
      </button>
    </div>
  </section>

  <!-- SLIDER SECTION -->
  <section class="relative overflow-hidden">
    <!-- Slides Container -->
    <div class="relative flex transition-transform duration-700 ease-in-out"
         :style="{ transform: `translateX(-${currentSlide * 100}%)` }">
      <div
        v-for="(slide, index) in slides"
        :key="index"
        class="flex-shrink-0 w-full h-full py-16 text-white bg-cover bg-center"
        :style="{ backgroundImage: `url(${slide.image})` }"
      >
        <div class="text-center max-w-2xl mx-auto px-4">
          <h2 class="text-4xl font-bold mb-4">{{ slide.title }}</h2>
          <p class="text-lg mb-6">{{ slide.description }}</p>
          <button class="px-6 py-3 border-2 border-white text-white rounded-lg hover:bg-white hover:text-black transition-all">
            {{ slide.buttonText }}
          </button>
        </div>
      </div>
    </div>

    <!-- Slide Indicators -->
    <div class="absolute bottom-4 w-full flex justify-center space-x-2">
      <button
        v-for="(slide, index) in slides"
        :key="index"
        @click="goToSlide(index)"
        class="w-4 h-4 rounded-full"
        :class="currentSlide === index ? 'bg-white' : 'bg-gray-500'"
      ></button>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      currentSlide: 0,
      slides: [
        {
          title: "Latest Drops",
          description:
            "Fresh, trendy, and just in! Our latest collection is here to elevate your style. Be the first to explore innovative designs and exclusive products.",
          image: "assets/LatestDrops.jpg",
          buttonText: "SHOP NOW",
        },
        {
          title: "Best Deals",
          description:
            "Discover our hottest picks with unbeatable deals! From bestsellers to must-have essentials, these products are flying off the shelves. Don’t miss out!",
          image: "assets/BestDeals.jpg",
          buttonText: "SHOP NOW",
        },
      ],
      autoplayInterval: null,
    };
  },
  methods: {
    nextSlide() {
      this.currentSlide = (this.currentSlide + 1) % this.slides.length;
    },
    goToSlide(index) {
      this.currentSlide = index;
    },
    startAutoplay() {
      this.autoplayInterval = setInterval(() => {
        this.nextSlide();
      }, 5000); // 5 seconds
    },
    stopAutoplay() {
      clearInterval(this.autoplayInterval);
    },
  },
  mounted() {
    this.startAutoplay();
  },
  beforeUnmount() {
    this.stopAutoplay();
  },
};
</script>

<style scoped>
/* Add a smooth hover effect for the button */
button:hover {
  transform: scale(1.1);
}
</style>
