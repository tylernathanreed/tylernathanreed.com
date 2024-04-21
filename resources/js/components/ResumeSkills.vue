<template>
    <div class="row">
        <div class="col-10 mx-auto">
            <section class="d-flex flex-column gap-2 px-2">
                <h2 class="leading-loose mb-0 fs-4 fw-bold text-center">Skills</h2>
                <div class="row">
                    <small v-for="item in skills"
                        class="col-md-2 col-3 d-flex align-items-center justify-content-center text-center border border-white"
                        :class="`bg-${calc(age(item.year))} text-white py-2 px-1`" :title="`${age(item.year)} years`">
                        {{ item.skill }}
                    </small>
                </div>

                <div class="skill-legend">
                    <div v-for="key in legend" :key="key.color" class="skill-legend-item">
                        <div :class="`skill-legend-key bg-${key.color}`"></div>
                        <span class="skill-legend-value">
                            {{ legendValue(key) }}
                        </span>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
export default {

    props: {
        skills: Array
    },

    methods: {
        _chunk(array, size) {
            return _.chunk(array, size)
        },

        age(year) {
            return Math.max((new Date).getFullYear() - year, 0) + ((new Date).getMonth() >= 5 ? 1 : 0)
        },

        calc(age) {

            // Determine the legend
            let legend = this.legend

            // Iterate through each legend item
            for (let i = 0; i < legend.length; i++) {

                // Determine the legend key
                let key = legend[i]

                // Check for upper bound
                if (key.min == null && age <= key.max) {
                    return key.color
                }

                // Check for lower bound
                else if (key.max == null && age >= key.min) {
                    return key.color
                }

                // Check if the age is within (inclusive) the range
                else if (key.min && key.max && age >= key.min && age <= key.max) {
                    return key.color
                }

            }

            // Unknown
            return 'black'
        },

        legendValue(key) {

            if (key.min == null) {
                return `< ${key.max + 1} year` + (key.max != 0 ? 's' : '')
            }

            else if (key.max == null) {
                return `${key.min}+ years`
            }

            else {
                return `${key.min} - ${key.max} years`
            }
        }
    },

    computed: {
        legend() {
            return [
                { 'color': 'blue', 'min': 8, 'max': null },
                { 'color': 'green', 'min': 5, 'max': 7 },
                { 'color': 'yellow', 'min': 3, 'max': 4 },
                { 'color': 'red', 'min': null, 'max': 2 }
            ]
        }
    }

}
</script>
