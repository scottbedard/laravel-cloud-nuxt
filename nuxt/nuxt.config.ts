import path from 'node:path'
import { fileURLToPath } from 'node:url'

const __filename = fileURLToPath(import.meta.url)
const __dirname = path.dirname(__filename)

// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  app: {
    buildAssetsDir: '/',
    cdnURL: '/_nuxt/',
  },

  compatibilityDate: '2024-11-01',

  devtools: {
    enabled: true
  },

  nitro: {
    output: {
      publicDir: path.resolve(__dirname, '../public/_nuxt')
    }
  },
})
