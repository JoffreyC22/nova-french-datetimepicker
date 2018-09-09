<template>
    <default-field :field="field">
        <template slot="field">
            <div class="flex items-center">
                <french-date-time-picker
                class="w-full form-control form-input form-input-bordered"
                :field="field"
                :value="value"
                :placeholder="placeholder"
                @change="handleChange"
                />

                <span class="text-80 text-sm ml-2">({{ userTimezone }})</span>
            </div>

            <p v-if="hasError" class="my-2 text-danger">
                {{ firstError }}
            </p>
        </template>
    </default-field>
</template>

<script>
import FrenchDateTimePicker from './../FrenchDateTimePicker'
import { Errors, FormField, HandlesValidationErrors, InteractsWithDates } from 'laravel-nova'

export default {
    mixins: [HandlesValidationErrors, FormField, InteractsWithDates],

    components: { FrenchDateTimePicker },
}
</script>
