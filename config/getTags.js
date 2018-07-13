module.exports = function getTags(posts) {
    return posts.reduce((tags, post) => {
        const filteredTags = post.data.tags ? post.data.tags.filter(tag => {
            return !tags.includes(tag);
        }) : [];
        console.log('filteredTags', filteredTags);
        return  filteredTags.concat(tags);
    }, []);
};
