import { defineStore } from 'pinia'

export const useAlertStore = defineStore("AlertStore", {
  state: () => ({
    messages: [],
    type: null,
  }),

  actions: {
    success(message) {
      this.clear();
      this.push(message);
      this.type = "success";
    },
    error(message) {
      this.clear();
      this.push(message);
      this.type = "error";
    },
    push(message) {
      if (
        Array.isArray(message) ||
        (typeof message === "object" && message != null)
      ) {
        for (let counter in message) {
          this.messages.push(message[counter]);
        }
      } else {
        this.messages.push(message);
      }
    },
    clear() {
      this.messages = [];
      this.type = null;
    },
    isSuccess() {
      return this.type === "success";
    },
    isError() {
      return this.type === "error";
    },
    hasAlert() {
      return this.messages.length > 0 && this.type != null;
    },
    hasMultiple() {
      return (
        (Array.isArray(this.messages.length) && this.messages.length > 1) ||
        (typeof this.messages === "object" &&
          this.messages != null &&
          Object.keys(this.messages).length > 1)
      );
    },
  },
});