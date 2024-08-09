import { Form, FormProvider, FormRenderer, useForm } from "@narsil-forms/Components";
import { useTranslationsStore } from "@narsil-ui/Stores/translationStore";

import {
	BackButton,
	Button,
	Section,
	SectionContent,
	SectionFooter,
	SectionHeader,
	SectionTitle,
} from "@narsil-ui/Components";

interface Props {
	form: FormType & { nodes: FormNodeType[] };
	status: string;
}

const Index = ({ form, status }: Props) => {
	const { trans } = useTranslationsStore();

	const reactForm = useForm({
		form: form,
	});

	return (
		<FormProvider {...reactForm}>
			<Form route={route("password.email")}>
				<Section>
					<SectionHeader>
						<SectionTitle>{form.title}</SectionTitle>
					</SectionHeader>
					<SectionContent>
						<FormRenderer nodes={form.nodes} />

						{status ? <span className='text-positive font-medium'>{status}</span> : null}
					</SectionContent>
					<SectionFooter>
						<Button type='submit'>{trans("Send")}</Button>
						<BackButton href={route("login")} />
					</SectionFooter>
				</Section>
			</Form>
		</FormProvider>
	);
};

export default Index;
