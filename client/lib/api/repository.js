export default $axios => resouce => ({
    index: () => $axios.$get(`/api/${resouce}`),
    create: data => $axios.$post(`/api/${resouce}`, data),
    show: id => $axios.$get(`/api/${resouce}/${id}`),
    update: (payload, id) => $axios.$put(`/api/${resouce}/${id}`, payload)
});
