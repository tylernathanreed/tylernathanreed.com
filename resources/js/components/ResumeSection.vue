<template>
    <section class="d-flex flex-column gap-2 px-md-5">
        <h2 class="leading-loose mb-0 fs-4 fw-bold text-center" v-text="title"></h2>

        <div class="row row-gap-3">
            <div v-for="(item, i) in items" :key="i" class="col-12">
                <div class="d-flex flex-column gap-1">
                    <div class="row">
                        <!-- Logo -->
                        <div class="col-1 d-none d-md-flex align-items-center justify-content-center">
                            <img :src="`/images/resume-logos/${item.logo}.png`" :alt="`${item.title} - ${item.company}`"
                                class="rounded" style="width: 2rem; height: 2rem;" />
                        </div>

                        <!-- Header -->
                        <div class="col-md-11 col-12 d-flex align-items-center justify-content-between"
                            style="line-height: 0.8">
                            <!-- Title & Mobile Logo -->
                            <div class="d-flex gap-2">
                                <div class="d-flex d-md-none align-items-center justify-content-center">
                                    <img :src="`/images/resume-logos/${item.logo}.png`"
                                        :alt="`${item.title} - ${item.company}`" class="rounded" style="width: 2rem;
                                        height: 2rem;" />
                                </div>
                                <div>
                                    <h3 v-text="item.title" class="fs-6 fw-bold mb-0"></h3>
                                    <small>
                                        <a v-if="item.url" :href="item.url" target="_blank" v-text="item.company"
                                            class="text-decoration-none" />
                                        <span v-else class="text-body-tertiary" v-text="item.company" />
                                    </small>
                                    <small v-if="item.type" class="text-body-tertiary d-md-inline d-none">
                                        <span class="opacity-50">&bull;</span> {{ item.type }}
                                    </small>
                                </div>
                            </div>

                            <!-- Time & Location -->
                            <div class="text-body-tertiary text-end">
                                <div>
                                    <small v-if="item.start && item.end">{{ item.start }} - {{ item.end }}</small>
                                    <small v-else-if="item.start">{{ item.start }} - <b>Present</b></small>
                                    <small v-else-if="item.end">{{ item.end }}</small>
                                    <small v-if="duration(item)" class="d-md-inline d-none">
                                        <span class="opacity-50">&bull;</span>
                                        <span>{{ duration(item) }}</span>
                                    </small>
                                    <br />
                                    <small>
                                        {{ item.location }}
                                        <span class="opacity-50">&bull;</span>
                                        {{ item.commute }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-gap-1">
                        <!-- Spacer -->
                        <div class="col-1 d-none d-md-block"></div>

                        <!-- Description -->
                        <div class="col-md-8 col-sm-9 col-12">
                            <div class="mr-md-4 pr-md-1">
                                <small>
                                    <div v-for="line in item.description"
                                        style="text-indent: -1.5ch; padding-left: 1.5ch;">
                                        &bull;&nbsp;{{ line }}
                                    </div>
                                </small>
                            </div>
                        </div>

                        <!-- Skills -->
                        <div class="col-sm-3 d-sm-block d-none">
                            <small v-if="item.skills">
                                <span class="fw-bold">Additional Skills:</span>
                                <div v-for="skill in item.skills" style="text-indent: -1.5ch; padding-left: 1.5ch;">
                                    &bull;&nbsp;{{ skill }}
                                </div>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import ResumeParagraph from '@/components/ResumeParagraph';

export default {
    components: {
        ResumeParagraph,
    },
    props: {
        title: String,
        items: Array
    },
    methods: {
        duration(item) {
            if (!item.start) {
                return;
            }

            const start = new Date(item.start);
            const end = item.end
                ? new Date(item.end)
                : new Date;

            let months = (end.getFullYear() - start.getFullYear()) * 12;
            months -= start.getMonth();
            months += end.getMonth();

            const years = Math.floor(months / 12);
            months -= years * 12;

            const yearStr = years === 1 ? '1 yr' : `${years} yrs`;
            const monthStr = months === 1 ? '1 mo' : `${months} mos`;

            if (years === 0) {
                return monthStr;
            } else if (months === 0) {
                return yearStr;
            } else {
                return `${yearStr} ${monthStr}`;
            }
        }
    }
}
</script>
