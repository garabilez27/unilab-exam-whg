<template>
    <div class="custom-modal" v-if="show">
      <div class="custom-modal-content">
        <div class="custom-modal-header">
          <h2>{{ title }}</h2>
          <span class="close" @click="closeModal"><i class="fa fa-close"></i></span>
        </div>
        <div class="custom-modal-body">
          <slot></slot> <!-- Slot for modal content -->
        </div>
        <div class="custom-modal-footer">
          <button class="btn btn-secondary pull-left" @click="closeModal">Cancel</button>
          <button class="btn btn-success" @click="closeModal">Save</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      show: Boolean, // Prop to control the modal's visibility
      title: String,  // Prop for the modal title
    },
    methods: {
      closeModal() {
        this.$emit('close'); // Emit a 'close' event to notify the parent component
      },
    },
  };
  </script>
  
  <style scoped>
  .custom-modal {
    position: fixed;
    z-index: 1000;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .custom-modal-content {
    background-color: #fff;
    border: 1px solid #ccc;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    width: 100%;
    max-width: 600px;
  }

  .custom-modal-header {
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    display: flex;
  }

  .custom-modal-header span {
    font-size: 24px;
    margin-left: auto;
  }

  .custom-modal-body {
    padding: 20px;
  }

  .custom-modal-footer {
    background-color: #f0f0f0;
    padding: 10px;
    text-align: right;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
  }
</style>
