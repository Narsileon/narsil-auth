import { Button, Section, SectionContent, SectionFooter, SectionHeader, SectionTitle } from "@narsil-ui/Components";
import { Form, FormProvider, FormRenderer, useForm } from "@narsil-forms/Components";
import { useTranslationsStore } from "@narsil-ui/Stores/translationStore";

interface Props {
	form: FormType & { nodes: FormNodeType[] };
}

const Index = ({ form }: Props) => {
	const { trans } = useTranslationsStore();

	const reactForm = useForm({
		form: form,
	});

	return (
		<FormProvider {...reactForm}>
			<Form route={route("two-factor.login")}>
				<Section>
					<SectionHeader>
						<SectionTitle>{form.title}</SectionTitle>
					</SectionHeader>
					<SectionContent>
						<FormRenderer nodes={form.nodes} />
					</SectionContent>
					<SectionFooter>
						<Button type='submit'>{trans("Confirm")}</Button>
					</SectionFooter>
				</Section>
			</Form>
		</FormProvider>
	);
};

export default Index;
