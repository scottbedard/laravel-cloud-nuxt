import { fileURLToPath } from 'node:url'
import fs from 'node:fs'
import path from 'node:path'

const __filename = fileURLToPath(import.meta.url)
const __dirname = path.dirname(__filename)

// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2024-11-01',

  devtools: {
    enabled: true
  },

  nitro: {
    hooks: {
      compiled() {
        const nuxtDir = path.resolve(__dirname, '../public/_nuxt')
        const tempDir = path.resolve(__dirname, '../public/_temp/_nuxt')

        if (fs.existsSync(nuxtDir)) {
          fs.rmSync(nuxtDir, { recursive: true, force: true });
        }

        fs.renameSync(tempDir, nuxtDir)

        fs.rmSync(path.resolve(__dirname, '../public/_temp'), { recursive: true })
      }
    },
    output: {
      publicDir: path.resolve(__dirname, '../public/_temp')
    }
  },
})
