import getTags from './getTags';

describe('getTags', () => {
    it('return array if post are empty array', () => {
        const tags = getTags([]);
        expect(tags).toEqual([]);
    });
    it('return array if post are empty array', () => {
        const tags = getTags([{
            data: {
                tags: ['firstTag', 'secondTag']
            }
        }, {
            data: {
                tags: ['firstTag']
            }
        }, {
            data: {
                tags: ['thirdTag']
            }
        }]);
        expect(tags).toContain('firstTag');
        expect(tags).toContain('secondTag');
        expect(tags).toContain('thirdTag');
        expect(tags.length).toBe(3)
    });
});
