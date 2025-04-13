<template>
  <div>
    <NuxtPage />

    <div>
      {{ hexchess.toString() }}
    </div>
  </div>
</template>

<script lang="ts" setup>
import { Hexchess } from '@bedard/hexchess'

const hexchess = new Hexchess()
</script>