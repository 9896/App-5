<template>
  <div>
    <nav
      class="
        bg-white
        border-gray-200
        px-2
        sm:px-4
        py-2.5
        rounded
        h-28
        dark:bg-gray-800
      "
    >
      <div
        class="container flex flex-wrap justify-between items-center mx-auto"
      >
        <a href="#" class="flex">
          <h1 class="font-bold mt-20">Create Task</h1>
        </a>
        <button
          data-collapse-toggle="mobile-menu"
          type="button"
          class="
            inline-flex
            items-center
            p-2
            ml-3
            text-sm text-gray-500
            rounded-lg
            md:hidden
            hover:bg-gray-100
            focus:outline-none focus:ring-2 focus:ring-gray-200
            dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600
          "
          aria-controls="mobile-menu-2"
          aria-expanded="false"
        >
          <span class="sr-only">Open main menu</span>
          <svg
            class="w-6 h-6"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              clip-rule="evenodd"
            ></path>
          </svg>
          <svg
            class="hidden w-6 h-6"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </button>
      </div>
    </nav>

    <div class="container mx-auto">
      <div class="grid grid-cols-1 justify-items-center mt-8">
        <!-- Task list page button -->
        <Link
          href="/task-list"
          class="
            mb-4
            shadow
            bg-teal-500
            hover:bg-teal-400
            focus:shadow-outline focus:outline-none
            text-white
            font-bold
            py-2
            px-4
            rounded
          "
        >
          View Task list</Link
        >

        <!-- Add task form -->
        <form
          @submit.prevent="submit"
          action="/add-task"
          class="w-full max-w-sm bg-white shadow-md rounded px-8 pt-6 pb-8"
        >
          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label
                class="
                  block
                  text-gray-500
                  font-bold
                  md:text-right
                  mb-1
                  md:mb-0
                  pr-4
                "
                for="title"
              >
                Title
              </label>
            </div>
            <div class="md:w-2/3">
              <input
                id="title"
                name="title"
                v-model="form.title"
                class="
                  appearance-none
                  border-2 border-gray-200
                  @enderror
                  rounded
                  w-full
                  py-2
                  px-4
                  text-gray-700
                  leading-tight
                  focus:outline-none focus:bg-white focus:border-teal-500
                "
                type="text"
              />

              <p class="text-red-500 text-xs italic mt-2" v-if="errors.title">
                {{ errors.title }}
              </p>
            </div>
          </div>

          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label
                for="description"
                class="
                  block
                  text-gray-500
                  font-bold
                  md:text-right
                  mb-1
                  md:mb-0
                  pr-4
                "
              >
                Description
              </label>
            </div>
            <div class="md:w-2/3">
              <textarea
                id="description"
                name="description"
                v-model="form.description"
                class="
                  appearance-none
                  border-2 border-gray-200
                  @enderror
                  rounded
                  w-full
                  py-2
                  px-4
                  text-gray-700
                  leading-tight
                  focus:outline-none focus:bg-white focus:border-teal-500
                "
              ></textarea>

              <p
                class="text-red-500 text-xs italic mt-2"
                v-if="errors.description"
              >
                {{ errors.description }}
              </p>
            </div>
          </div>

          <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
              <button
                :disabled="form.processing"
                type="submit"
                class="
                  shadow
                  bg-teal-500
                  hover:bg-teal-400
                  focus:shadow-outline focus:outline-none
                  text-white
                  font-bold
                  py-2
                  px-4
                  rounded
                "
              >
                Add
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  props: ["name", "errors"],
  components: {
    Link,
  },
  data() {
    return {
      form: {
        title: null,
        description: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post("/add-task", this.form);
    },
  },
};
</script>