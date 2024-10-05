<template>
  <div class="error-page">
    <div class="error-content">
      <h1 class="error-title">Oops!</h1>
      <p class="error-message">This page does not exist or you are forbidden</p>
      <a href="/" class="btn btn-success">Go Back Home</a>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
.error-page {
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #f5f5f5;
}

.error-content {
  text-align: center;
  padding: 3rem;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  border-radius: 5px;
}

.error-title {
  font-size: 3rem;
  margin-bottom: 1rem;
  color: #333;
}

.error-message {
  font-size: 1.2rem;
  color: #777;
  margin-bottom: 2rem;
}

.error-button {
  background-color: #333;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}

.error-button:hover {
  background-color: #222;
}
</style>