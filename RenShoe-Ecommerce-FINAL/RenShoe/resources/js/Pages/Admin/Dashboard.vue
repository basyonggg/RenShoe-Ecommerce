<template>
  <AdminLayout>

    <!-- 4 SQUARES STATISTICS-->
    <div class="flex flex-wrap -m-4 text-center">
      <!--ORDER COUNTER-->
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-gray-700 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
              <path d="M21 8l-9-5-9 5 9 5 9-5z"></path>
              <path d="M3 8v8l9 5 9-5V8"></path>
              <path d="M9 19v-7"></path>
              <path d="M15 19v-7"></path>
          </svg>
          <h2 class="title-font font-medium text-3xl text-gray-900">{{ totalStocks }}</h2>
          <p class="leading-relaxed">Stocks</p>
        </div>
      </div>
      <!--USERS COUNTER-->
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-gray-700 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
          </svg>
          <h2 class="title-font font-medium text-3xl text-gray-900">3</h2>
          <p class="leading-relaxed">Users</p>
        </div>
      </div>
      <!--STOCKS COUNTER-->
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-gray-700 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
              <path d="M6 8a6 6 0 0112 0"></path>
              <rect x="4" y="8" width="16" height="12" rx="2"></rect>
              <path d="M9 11v2"></path>
              <path d="M15 11v2"></path>
          </svg>
          <h2 class="title-font font-medium text-3xl text-gray-900">2</h2>
          <p class="leading-relaxed">Orders</p>
        </div>
      </div>
      <!--SALES COUNTER-->
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-gray-700 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M2 17V3h18v14"></path>
            <path d="M7 14v3"></path>
            <path d="M11 10v7"></path>
            <path d="M15 7v10"></path>
          </svg>
          <h2 class="title-font font-medium text-3xl text-gray-900">2300</h2>
          <p class="leading-relaxed">Total Sales</p>
        </div>
      </div>
    </div>
    <!-- 4 SQUARES STATISTICS END-->

    <!--CHARTS-->
    <div class="mt-8">
      <div
          class="col-span-12 rounded-sm border border-stroke bg-white px-5 pt-7.5 pb-5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-8">
          <div class="flex flex-wrap items-start justify-between gap-3 sm:flex-nowrap">
            <div class="flex w-full flex-wrap gap-3 sm:gap-5 mt-6">
              <div class="flex min-w-47.5">
                <span
                  class="mt-1 mr-2 flex h-4 w-full max-w-4 items-center justify-center rounded-full border border-primary">
                  <span class="block h-2.5 w-full max-w-2.5 rounded-full bg-primary"></span>
                </span>
                <div class="w-full">
                  <p class="font-semibold text-primary">Total Revenue</p>
                  <p class="text-sm font-medium">12.04.2022 - 12.05.2022</p>
                </div>
              </div>
              <div class="flex min-w-47.5">
                <span
                  class="mt-1 mr-2 flex h-4 w-full max-w-4 items-center justify-center rounded-full border border-secondary">
                  <span class="block h-2.5 w-full max-w-2.5 rounded-full bg-secondary"></span>
                </span>
                <div class="w-full">
                  <p class="font-semibold text-secondary">Total Sales</p>
                  <p class="text-sm font-medium">12.04.2022 - 12.05.2022</p>
                </div>
              </div>
            </div>
            <div class="flex w-full max-w-45 justify-end mt-6">
              <div class="inline-flex items-center rounded-md bg-whiter p-1.5 dark:bg-meta-4">
                <button
                  class="rounded bg-white py-1 px-3 text-xs font-medium text-black shadow-card hover:bg-white hover:shadow-card dark:bg-boxdark dark:text-white dark:hover:bg-boxdark">
                  Day
                </button>
                <button
                  class="rounded py-1 px-3 text-xs font-medium text-black hover:bg-white hover:shadow-card dark:text-white dark:hover:bg-boxdark">
                  Week
                </button>
                <button
                  class="rounded py-1 px-3 text-xs font-medium text-black hover:bg-white hover:shadow-card dark:text-white dark:hover:bg-boxdark">
                  Month
                </button>
              </div>
            </div>
          </div>
          <div>
            <div id="chartOne" class="-ml-5">
              <VueApexCharts type="area" height="350" :options="apexOptions" :series="chartData.series" ref="chart" />
            </div>
          </div>
        </div>
    </div>

    <!--CHARTS END-->
  </AdminLayout>

</template>

<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import 'flowbite';
import ApexCharts from 'apexcharts';
import  AdminLayout from './Components/AdminLayout.vue';
import { ref } from 'vue';
import VueApexCharts from "vue3-apexcharts";
import Chart from 'chart.js/auto';


// initialize components based on data attribute selectors
onMounted(() => {
  initFlowbite();
})

//CHARTS SCRIPT
const chartData = {
  series: [
    {
      name: 'Product One',
      data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30, 45]
    },

    {
      name: 'Product Two',
      data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39, 51]
    }
  ],
  labels: ['Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug']
}

const chart = ref(null)

const apexOptions = {
  legend: {
    show: false,
    position: 'top',
    horizontalAlign: 'left'
  },
  colors: ['#3C50E0', '#80CAEE'],
  chart: {
    fontFamily: 'Satoshi, sans-serif',
    height: 335,
    type: 'area',
    dropShadow: {
      enabled: true,
      color: '#623CEA14',
      top: 10,
      blur: 4,
      left: 0,
      opacity: 0.1
    },

    toolbar: {
      show: false
    }
  },
  responsive: [
    {
      breakpoint: 1024,
      options: {
        chart: {
          height: 300
        }
      }
    },
    {
      breakpoint: 1366,
      options: {
        chart: {
          height: 350
        }
      }
    }
  ],
  stroke: {
    width: [2, 2],
    curve: 'straight'
  },

  labels: {
    show: false,
    position: 'top'
  },
  grid: {
    xaxis: {
      lines: {
        show: true
      }
    },
    yaxis: {
      lines: {
        show: true
      }
    }
  },
  dataLabels: {
    enabled: false
  },
  markers: {
    size: 4,
    colors: '#fff',
    strokeColors: ['#3056D3', '#80CAEE'],
    strokeWidth: 3,
    strokeOpacity: 0.9,
    strokeDashArray: 0,
    fillOpacity: 1,
    discrete: [],
    hover: {
      size: undefined,
      sizeOffset: 5
    }
  },
  xaxis: {
    type: 'category',
    categories: chartData.labels,
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    }
  },
  yaxis: {
    title: {
      style: {
        fontSize: '0px'
      }
    },
    min: 0,
    max: 100
  }
}
// Declare a ref to hold the total stock count
const totalStocks = ref(0);

// Define a method to fetch the total stock count
const fetchTotalStocks = async () => {
  try {
    const response = await axios.get('/total-stocks');  // Make sure the route is correct
    totalStocks.value = response.data.totalStocks;  // Update the ref with the fetched total stock
  } catch (error) {
    console.error('Error fetching total stocks:', error);
  }
};

// Fetch total stocks when the component is mounted
onMounted(() => {
  fetchTotalStocks();
});
</script>