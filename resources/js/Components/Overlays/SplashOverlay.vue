<template>
  <div class="fixed inset-0 z-[60] flex items-center justify-center bg-gradient-to-br from-indigo-500 to-purple-600 text-white">
    <div class="text-center animate-fadeIn">
      <div class="text-3xl font-bold mb-4 drop-shadow">Forahia Digital Innovation</div>
      <div class="text-lg mb-6 opacity-90">Transforming Ideas into Digital Reality</div>
      <div class="loading-spinner mx-auto mb-4"></div>
      <div class="text-sm opacity-80">Loading your digital experience...</div>
    </div>
  </div>
</template>

<script setup>
// Pure overlay; timing is controlled by parent page.
</script>

<style scoped>
.loading-spinner {
  width: 50px;
  height: 50px;
  border: 4px solid rgba(255,255,255,0.3);
  border-top: 4px solid white;
  border-radius: 50%;
  animation: spin 1s linear infinite;
}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fadeIn { animation: fadeIn 1s ease-in-out; }
</style>
