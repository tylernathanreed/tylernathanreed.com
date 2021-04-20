<template>
    <section class="mb-6">
        <h2 class="text-center">Programming Skills</h2>

        <div class="row">
            <div v-for="(skills, name) in groups" :key="name" class="col-md-6">
                <h3 class="text-center mb-3">{{ name }}</h3>

                <table class="text-center mx-auto mb-4 w-100 table-fixed">
                    <tbody>
                        <tr v-for="chunk in _chunk(skills, 4)">
                            <td v-for="item in chunk" :class="`bg-${calc(age(item.year))} text-white py-1`">
                                {{ item.skill }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
</template>

<script>
    export default {

        props: {
            groups: Object
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
                for(let i = 0; i < legend.length; i++) {

                    // Determine the legend key
                    let key = legend[i]

                    // Check for upper bound
                    if(key.min == null && age <= key.max) {
                        return key.color
                    }

                    // Check for lower bound
                    else if(key.max == null && age >= key.min) {
                        return key.color
                    }

                    // Check if the age is within (inclusive) the range
                    else if(key.min && key.max && age >= key.min && age <= key.max) {
                        return key.color
                    }

                }

                // Unknown
                return 'black'
            },

            legendValue(key) {

                if(key.min == null) {
                    return `< ${key.max + 1} year` + (key.max != 0 ? 's' : '')
                }

                else if(key.max == null) {
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
                    {'color': 'blue', 'min': 6, 'max': null},
                    {'color': 'green', 'min': 3, 'max': 5},
                    {'color': 'yellow', 'min': 1, 'max': 2},
                    {'color': 'red', 'min': null, 'max': 0}
                ]
            }
        }

    }
</script>